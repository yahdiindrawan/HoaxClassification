import json
nama = [['yahdi','indrawan']]
kelas = [['1','2']]

hasil = {}
hasil['nama'] = nama[0]
hasil['kelas']= kelas[0]
print(json)

hasil_json = json.dumps(hasil)

hasil = json.loads(hasil_json)
print(hasil['nama'][0])