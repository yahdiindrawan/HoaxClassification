import string
import re
from nltk.tokenize import word_tokenize
from nltk.corpus import stopwords
from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
data = "Beredar sebuah tangkapan layar yang menunjukkan percakapan terkait dengan pemesanan masker. Dalam percakapan tersebut, terlihat sebuah pesan dengan narasi bahwa Dr Tompi menjadi salah satu orang yang turut serta memesan masker. Menanggapi beredarnya tangkapan layar tersebut, Tompi pun mengklarifikasi melalui media sosial miliknya dengan menyatakan bahwa tidak benar jika dirinya memesan masker seperti halnya yang tertera dalam tangkapan layar."

case_folding = data.lower()
#print(case_folding)

punctuation = case_folding.translate(str.maketrans('','',string.punctuation))
#print(punctuation)

number = re.sub(r'\d+','',punctuation)
#print(number)

whitespace = number.strip()
#print(whitespace)

tokenize = word_tokenize(whitespace)
#print(tokenize)

list_stopwords = set(stopwords.words('indonesian'))
hasil_list = []
for i in tokenize:
	if i not in list_stopwords and len(i)>=3 and len(i)<=12 and i not in hasil_list:
		hasil_list.append(i)
stopwords = hasil_list
#print(stopwords)

factory = StemmerFactory()
stemmer = factory.create_stemmer()

data_akhir = []
for i in stopwords:
	kata = stemmer.stem(i)
	data_akhir.append(kata)
stemming = data_akhir
print(stemming)