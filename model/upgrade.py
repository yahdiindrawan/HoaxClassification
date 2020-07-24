import json
import numpy as np
import pandas as pd
import pickle
from collections import defaultdict
import re
from bs4 import BeautifulSoup
import sys
import os
import string
import nltk
from nltk.tokenize import word_tokenize
from nltk.corpus import stopwords
from keras.preprocessing.text import Tokenizer
from keras.preprocessing.sequence import pad_sequences
from keras.utils.np_utils import to_categorical
from keras.layers import Embedding
from keras.layers import Dense, Input, Flatten
from keras.layers import Conv1D, MaxPooling1D, Embedding, Dropout
from keras.models import Model
from keras.callbacks import ModelCheckpoint
import matplotlib.pyplot as plt
import gensim
from gensim.models import Word2Vec
from sklearn.model_selection import train_test_split
from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
from scipy import interp
from sklearn.metrics import auc
from sklearn.metrics import plot_roc_curve
from sklearn.model_selection import StratifiedKFold
from keras.models import load_model
from keras.models import model_from_json
from gensim import models
from keras.callbacks import EarlyStopping
from sklearn.metrics import confusion_matrix
from sklearn.metrics import roc_curve, auc

#Dataset
data = {
	'Konten' : [
		'indonesia bagus sekali',
		'jokowi mundur dari presiden',
		'Viralkan! kegagalan rezim ini',
		'Kementerian Pemuda dan Olahraga mengamati bahwa olahraga saat ini minim prestasti.',
		'Corona hilang dari muka bumi esok hari',
		'Vaksin virus corona telah ditemukan oleh orang Indonesia',
		'Akan ada kabut Dukhan pada 15 Ramadhan tahun ini',
		'Prabowo mengakui Presiden Joko Widodo sebagai pemimpin yang amanah',
		'Tim Nasional Indonesia akan dilatih oleh Shin Tae Yong',
		'Kiamat besok'
	],
	'Kelas' : [
		'Fakta',
		'Hoax',
		'Fakta',
		'Fakta',
		'Hoax',
		'Hoax',
		'Hoax',
		'Fakta',
		'Fakta',
		'Hoax'
	]
}

#Load Model
json_file = open('C:/xampp/htdocs/hoax_classification/model/model_cnn.json', 'r')
model_json = json_file.read()
model = model_from_json(model_json)
model.load_weights("C:/xampp/htdocs/hoax_classification/model/model_cnn.h5")

with open('C:/xampp/htdocs/hoax_classification/model/tokenizer.pickle', 'rb') as handle:
	tokenizer = pickle.load(handle)

#Inisialisasi
MAX_SEQUENCE_LENGTH = 1000
MAX_NB_WORDS = 20000
EMBEDDING_DIM = 100
VALIDATION_SPLIT = 0.2

#Fungsi Preprocessing
def case_folding(data):
  data = data.lower()
  return data

def remove_punctuation(data):
  data = data.translate(str.maketrans('','',string.punctuation))
  return data

def remove_numbers(data):
  data = re.sub(r'\d+','',data)
  return data

def remove_whitespace(data):
  data = data.strip()
  return data

def tokenizing(data):
  data = word_tokenize(data)
  return data

list_stopwords = set(stopwords.words('indonesian'))
def stopwords(data):
  hasil_list = []
  for i in data:
    if i not in list_stopwords and len(i)>=3 and len(i)<=12 and i not in hasil_list:
      hasil_list.append(i)
  data = hasil_list
  return data

factory = StemmerFactory()
stemmer = factory.create_stemmer()
def stemming(data):
  data_akhir = []
  for i in data:
    kata = stemmer.stem(i)
    data_akhir.append(kata)
  return data_akhir

# df = pd.DataFrame.from_dict(data)
df = pd.read_csv('data_akhir.csv', encoding='utf-8')
df = df.dropna()
df = df.reset_index(drop=True)


#Merubah Kelas menjadi nilai 0 atau 1
macronum=sorted(set(df['Kelas']))
macro_to_id = dict((note, number) for number, note in enumerate(macronum))
def fun(i):
    return macro_to_id[i]

df['Kelas']=df['Kelas'].apply(fun)


# #Proses Preprocessing
# hasil_case_folding = []
# for i in range(len(df.Konten)):
#   hasil_case_folding.append(case_folding(df.Konten[i]))

# hasil_remove_punctuation = []
# for i in range(len(hasil_case_folding)):
#   hasil_remove_punctuation.append(remove_punctuation(hasil_case_folding[i]))

# hasil_remove_numbers = []
# for i in range(len(hasil_remove_punctuation)):
#   hasil_remove_numbers.append(remove_numbers(hasil_remove_punctuation[i]))

# hasil_remove_whitespace = []
# for i in range(len(hasil_remove_numbers)):
#   hasil_remove_whitespace.append(remove_whitespace(hasil_remove_numbers[i]))

# hasil_tokenizing = []
# for i in range(len(hasil_remove_whitespace)):
#   hasil_tokenizing.append(tokenizing(hasil_remove_whitespace[i]))

# hasil_stopword = []
# for i in range(len(hasil_tokenizing)):
#   hasil_stopword.append(stopwords(hasil_tokenizing[i]))

# hasil_stemming = []
# for i in range(len(hasil_stopword)):
#   hasil_stemming.append(stemming(hasil_stopword[i]))


json_file = open('hasil_preprocessing.json','r')
data = json.loads(json_file.read())

hasil_preprocessing = []
label = []
hasil_preprocessing.append(data['hasil_preprocessing'])
label.append(data['label'])

df['Tokens'] = hasil_preprocessing[0]
df['Kelas'] = label[0]
df['Text_Final'] = [' '.join(sen) for sen in hasil_preprocessing[0]]

df = df[['Konten','Text_Final','Tokens','Kelas']]
df.head()

x = df['Text_Final']
y = df['Kelas']

# labels = []
  
# for i in df['Kelas']:
#   labels.append(i)

# hasil_preprocessing = hasil_stemming
# df['Tokens'] = hasil_preprocessing
# df['Kelas'] = labels
# df['Text_Final'] = [' '.join(sen) for sen in hasil_preprocessing]

# df = df[['Konten','Text_Final','Tokens','Kelas']]

# x = df['Text_Final']
# y = df['Kelas']


kfold = StratifiedKFold(n_splits=5, shuffle=True, random_state=0)

acc=[]
presisi=[]
recal=[]

tprs = []
aucs = []
mean_fpr = np.linspace(0, 1, 100)
fig, ax = plt.subplots()
fold = 1
for train, test in kfold.split(x, y):
  labelss= pd.DataFrame(columns=['Fakta', 'Hoax'])
  print(y[train])
  print(labelss)
  fakta = []
  hoax = []
  for l in y[train]:
    if l == 0:
        fakta.append(1)
        hoax.append(0)
    elif l == 1:
        fakta.append(0)
        hoax.append(1)

  labelss['Fakta']= fakta
  labelss['Hoax']= hoax

  word2vec_path = 'Word2Vec.txt'
  word2vec = models.KeyedVectors.load_word2vec_format(word2vec_path, binary=True)

  MAX_SEQUENCE_LENGTH = 1000
  EMBEDDING_DIM = 100
  MAX_NB_WORDS = 20000
  x[train]=x[train].astype(str)

  
  tokenizer.fit_on_texts(x[train].tolist())
  training_sequences = tokenizer.texts_to_sequences(x[train].tolist())

  train_word_index = tokenizer.word_index
  print('Found %s unique tokens.' % len(train_word_index))

  train_cnn_data = pad_sequences(training_sequences, maxlen=MAX_SEQUENCE_LENGTH)

  train_embedding_weights = np.zeros((len(train_word_index)+1, EMBEDDING_DIM))
  for word,index in train_word_index.items():
      train_embedding_weights[index,:] = word2vec[word] if word in word2vec else np.random.rand(EMBEDDING_DIM)


  test_sequences = tokenizer.texts_to_sequences(x[test].tolist())
  test_cnn_data = pad_sequences(test_sequences, maxlen=MAX_SEQUENCE_LENGTH)

  label_names = ['Fakta', 'Hoax']

  y_train = labelss.values
  x_train = train_cnn_data
  y_tr = y_train

  # embedding_layer = Embedding(len(train_word_index)+1,
  #   		                            EMBEDDING_DIM,
  #   		                            weights=[train_embedding_weights],
  #   		                            input_length=MAX_SEQUENCE_LENGTH,
  #   		                            trainable=True)
    		    
  # sequence_input = Input(shape=(MAX_SEQUENCE_LENGTH,), dtype='int32')
  # embedded_sequences = embedding_layer(sequence_input)
  # l_cov1= Conv1D(128, 5, activation='relu')(embedded_sequences)
  # l_pool1 = MaxPooling1D(5)(l_cov1)
  # l_cov2 = Conv1D(128, 5, activation='relu')(l_pool1)
  # l_pool2 = MaxPooling1D(5)(l_cov2)
  # l_cov3 = Conv1D(128, 5, activation='relu')(l_pool2)
  # l_pool3 = MaxPooling1D(35)(l_cov3)  # global max pooling
  # l_flat = Flatten()(l_pool3)
  # l_dense = Dense(128, activation='relu')(l_flat)
  # preds = Dense(len(macronum), activation='softmax')(l_dense)

  # model = Model(sequence_input, preds)
  model.compile(loss='binary_crossentropy',
                optimizer='adam',
                metrics=['acc'])

  # print("Simplified convolutional neural network")
  # model.summary()
  # cp=ModelCheckpoint('model_cnn.hdf5',monitor='val_acc',verbose=1,save_best_only=True)

  num_epochs = 100
  batch_size = 32

  es_callback =EarlyStopping(monitor='val_loss', patience=10, verbose=1)

  hist = model.fit(x_train, y_tr, epochs=num_epochs, validation_split=0.2, shuffle=True , batch_size=batch_size,callbacks=[es_callback])

  predictions = model.predict(test_cnn_data, batch_size=1, verbose=1)
  labels = [0,1]
  prediction_labels=[]
  for p in predictions:
      prediction_labels.append(labels[np.argmax(p)])

  xx=sum(y[test]==prediction_labels)/len(prediction_labels)

  y_test= y[test].values

  y_tes=[]
  for i in range(0, len(y_test)):
    y_tes.append(y_test[i])

  y_pred=[]
  for p in predictions:
      y_pred.append(labels[np.argmax(p)])

  cf_sentimen = pd.DataFrame(data=confusion_matrix(y_tes, y_pred, labels=labels), columns=labels, index=labels)
  print(cf_sentimen)

  tps_sentimen = {}
  fps_sentimen  = {}
  fns_sentimen  = {}
  tns_sentimen  = {}
  for label in labels:
    tps_sentimen[label] = cf_sentimen.loc[label, label]
    fps_sentimen[label] = cf_sentimen[label].sum() - tps_sentimen[label]
    fns_sentimen[label] = cf_sentimen.loc[label].sum() - tps_sentimen[label]

  for label in set(y_tes):
    tns_sentimen[label] = len(y_tes) - (tps_sentimen[label] + fps_sentimen[label] + fns_sentimen[label])

  accuracy_global_new_sentimen=sum(tps_sentimen.values())/len(y_tes)
  acc.append(accuracy_global_new_sentimen)


  tpfp_sentimen = [ai + bi for ai, bi in zip(list(tps_sentimen.values()), list(fps_sentimen.values()))]
  precision=[ai / bi if bi>0 else 0 for ai , bi in zip(list(tps_sentimen.values()), tpfp_sentimen)]
  precisionSentimen=sum(precision)/2
  presisi.append(precisionSentimen)

  tpfn_sentimen = [ai + bi for ai, bi in zip(list(tps_sentimen.values()), list(fns_sentimen.values()))]
  recall=[ai / bi if bi>0 else 0 for ai, bi in zip(list(tps_sentimen.values()), tpfn_sentimen)]
  recallSentimen=sum(recall)/2
  recal.append(recallSentimen)

  fpr, tpr, thresholds = roc_curve(y_test, y_pred)
  nilai_auc = auc(fpr, tpr)
  interp_tpr = interp(mean_fpr, fpr, tpr)
  interp_tpr[0] = 0.0
  tprs.append(interp_tpr)
  aucs.append(nilai_auc)
  ax.plot(mean_fpr, interp_tpr, label=r'ROC Fold %d (AUC = %f)' % (fold, nilai_auc),
      lw=1, alpha=0.3)
  fold=fold+1

print(acc)
print(presisi)
print(recal)

print(sum(acc)/len(acc))
print(sum(presisi)/len(presisi))
print(sum(recal)/len(recal))