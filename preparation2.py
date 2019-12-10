import csv
import re
import string

filename = 'data_awal.csv'
f = open(filename,'r', encoding='utf8')
reader = csv.reader(f)
total_data = 0
total_penjelasan = 0
total_narasi = 0
w = open('data_akhir2.csv','w', encoding='utf8', newline='')
writer = csv.writer(w)
head = [['Konten','Kelas']]
writer.writerows(head)
data = []
for row in reader:	
	judul = row[0]
	tanggal = row[1]
	kelas = row[0].split(' ')[0].translate(str.maketrans('','',string.punctuation))
	narasi = re.findall(r'narasi(.*?)penjelasan', row[2].replace('\n',' ').lower())
	penjelasan = re.findall(r'penjelasan(.*?)referensi', row[2].replace('\n',' ').lower())
	if kelas == "SALAH" or kelas == "HOAX" or kelas =="DISINFORMASI" or kelas =="MISINFORMASI" :
		total_data+=1
		if len(narasi) is not 0 :
			if len(narasi) == 1 :
				narasi = narasi[0]
			elif len(narasi) == 2 :
				narasi = narasi[0]+narasi[1]
			elif len(narasi) == 3 :
				narasi = narasi[0]+narasi[1]+narasi[2]


			if len(narasi) > 15 :
				kelas = "HOAX"
				data = [[narasi,kelas]]
				writer.writerows(data)
				total_narasi+=1
				#print("Narasi ", total_data, " : ", len(narasi))

		if len(penjelasan) == 1 :
			penjelasan = penjelasan[0]
		elif len(penjelasan) == 2 :
			penjelasan = penjelasan[1]

		if len(penjelasan) > 10 :
			kelas = "FAKTA"
			data = [[penjelasan,kelas]]
			writer.writerows(data)
			total_penjelasan+=1
			#print("Penjelasan ", total_penjelasan, " : ", len(penjelasan))
	
	elif kelas=="KLARIFIKASI" or kelas=="BENAR" :
		if len(penjelasan) == 1 :
			penjelasan = penjelasan[0]
		elif len(penjelasan) == 2 :
			penjelasan = penjelasan[1]

		if len(penjelasan) > 10 :
			kelas = "FAKTA"
			data = [[penjelasan,kelas]]
			writer.writerows(data)
			total_penjelasan+=1	
			#print("Penjelasan ", total_penjelasan, " : ", len(penjelasan))

print("Total Narasi 	: ", total_narasi)
print("Total Penjelasan : ", total_penjelasan)
print("Total Data 		: ", total_narasi+total_penjelasan)
f.close()
w.close()