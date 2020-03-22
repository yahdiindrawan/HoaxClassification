import sys
import json
import base64
import string
import re
import pickle
import numpy as np

from nltk.tokenize import word_tokenize
from nltk.corpus import stopwords
from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
#from keras.preprocessing.text import Tokenizer
#from keras.preprocessing.sequence import pad_sequences
#from keras.models import load_model
#from keras.models import model_from_json

MAX_SEQUENCE_LENGTH = 1000

#Load Model
#json_file = open('C:/xampp/htdocs/hoax_classification/model/model_cnn.json', 'r')
#model_json = json_file.read()
#model = model_from_json(model_json)
#model.load_weights("C:/xampp/htdocs/hoax_classification/model/model_cnn.h5")

with open('C:/xampp/htdocs/hoax_classification/model/tokenizer.pickle', 'rb') as handle:
	tokenizer = pickle.load(handle)

data = sys.argv[2]
#cek = json.loads(base64.b64decode(sys.argv[1]))
#data = cek['data']
data = "Prihatin dengan kelangkaan hand sanitizer, atau cairan pembersih tangan, di tengah wabah corona, para siswa SMK Kesehatan Citra Medika Sukoharjo, Jawa Tengah, membuat hand sanitizer dengan ramuan berbahan bahan herbal. Kala virus corona tengah menjadi ancaman, sejumlah siswa SMK Kesehatan Citra Medika Sukoharjo, Jawa Tengah, tak mau berdiam diri. Mereka menghabiskan waktu di laboratorium sekolah, membuat cairan pembersih tangan dengan bahan lidah buaya atau aloe vera. Pembuatan cairan pencuci tangan berbahan dasar lidah buaya ini terbilang sederhana. Mulai dari proses membuat daging lidah buaya menjadi lembut dengan menggunakan mesin pengaduk blender, sampai menapis, sehingga tersisa cairan. Khusus untuk saringan terakhir, aloe vera yang sudah halus ditambah dengan bahan kimia serta alkohol 96 persen. Cairan pencuci tangan pun siap digunakan."
data = [data]
data = np.array(data)

#Case folding
def case_folding(data):
  data = data.lower()
  return data

def remove_punctuation(data):
  data = data.translate(str.maketrans('','',string.punctuation))
  return data

def remove_numbers(data):
  data = re.sub(r'\d+','',data)
  return data

def tokenizing(data):
  data = word_tokenize(data)
  return data

def remove_whitespace(data):
  data = data.strip()
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


hasil_case_folding = []
for i in range(len(data)):
  hasil_case_folding.append(case_folding(data[i]))


hasil_remove_punctuation = []
for i in range(len(hasil_case_folding)):
  hasil_remove_punctuation.append(remove_punctuation(hasil_case_folding[i]))


hasil_remove_numbers = []
for i in range(len(hasil_remove_punctuation)):
  hasil_remove_numbers.append(remove_numbers(hasil_remove_punctuation[i]))


hasil_remove_whitespace = []
for i in range(len(hasil_remove_numbers)):
  hasil_remove_whitespace.append(remove_whitespace(hasil_remove_numbers[i]))


hasil_tokenizing = []
for i in range(len(hasil_remove_whitespace)):
  hasil_tokenizing.append(tokenizing(hasil_remove_whitespace[i]))
str_tokenizing = str(hasil_tokenizing)



#Stopword
hasil_stopword = []
for i in range(len(hasil_tokenizing)):
  hasil_stopword.append(stopwords(hasil_tokenizing[i]))
str_stopword = str(hasil_stopword)


#Stemming
hasil_stemming = []
for i in range(len(hasil_stopword)):
  hasil_stemming.append(stemming(hasil_stopword[i]))
str_stemming = str(hasil_stemming)


preprocessing = [' '.join(sen) for sen in hasil_stemming]
sequences = tokenizer.texts_to_sequences(hasil_stemming)
str_sequences = str(sequences)

#word_index = tokenizer.word_index


#test_data = pad_sequences(sequences, maxlen=MAX_SEQUENCE_LENGTH)
#x_test = test_data


#prediksi = model.predict(x_test, batch_size=1, verbose=1)
#probabilitas = "FAKTA : " + str(prediksi[0][0]) + "  |  HOAX : " + str(prediksi[0][1]) 
#probabilitas_pembulatan = "FAKTA : " + str(round(prediksi[0][0])) + "  |  HOAX : " + str(round(prediksi[0][1]))

#class_category = ['fakta', 'hoax']
#for i in range(prediksi.shape[0]):
#  klasifikasi = class_category[prediksi[i].argmax()]

hasil = {
	'case_folding': hasil_case_folding,
	'remove_punctuation': hasil_remove_punctuation,
	'remove_number': hasil_remove_numbers,
	'tokenizing': str_tokenizing,
	'stopword': str_stopword,
	'stemming': str_stemming,
	'hasil_preprocessing': str_stemming,
	'vektor': str_sequences,
	'klasifikasi': 'hoax'
}
hasil = json.dumps(hasil)
print(hasil)

