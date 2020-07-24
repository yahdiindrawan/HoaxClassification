import json
from gensim import models
from gensim.models import Word2Vec

json_file = open('hasil_preprocessing.json','r')
data = json.loads(json_file.read())

hasil_preprocessing = []
label = []
hasil_preprocessing.append(data['hasil_preprocessing'])
label.append(data['label'])

tokens = hasil_preprocessing[0]
model = Word2Vec(tokens, size=100, min_count=1)
model.wv.save_word2vec_format('Word2Vec.txt', binary=False)