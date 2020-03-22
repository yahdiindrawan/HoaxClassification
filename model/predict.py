import numpy as np
import re
from bs4 import BeautifulSoup
from keras.preprocessing.text import Tokenizer
from keras.preprocessing.sequence import pad_sequences
from keras.models import load_model
from keras.models import model_from_json

#Inisialisasi Variabel
MAX_NB_WORDS = 2000
MAX_SEQUENCE_LENGTH = 1000

#Load Model & Weight
json_file = open('model_cnn.json', 'r')
model_json = json_file.read()
model = model_from_json(model_json)
model.load_weights("model_cnn.h5")

#Preprocessing
def clean_str(string):
    string = re.sub(r"\\", "", string)
    string = re.sub(r"\'", "", string)
    string = re.sub(r"\"", "", string)
    return string.strip().lower()

data = [": belum lama ini, beredar sebuah screenshoot berupa percakapan yang diklaim sebagai bupati banyuangi, azwar anas. dalam percakapan tersebut terlihat bahwa sang bupati menjanjikan pekerjaan pada penerima pesan dengan membayar sejumlah uang. penerima pesan tersebut diketahui bernama siti aminah yang tinggal di malaysia. awal september 2019 siti menerima pesan jawaban via messenger dari akun facebook abdullah azwar anas.  siti mengirim pesan kepada akun tersebut menanyakan lowongan kerja untuk putrinya. tak berapa lama akun tersebut membalas dan percakapan berlanjut via whatsapp yang memberitahu ada lowongan kerja tapi harus membayar senilai rp 3 juta via transfer ke nomor rekening tertentu. menanggapi masalah tersebut, sekretaris daerah banyuwangi mujiono mengimbau kepada semua pihak untuk berhati-hati dalam menanggapi pesan serupa. â€œitu jelas penipuan, masyarakat jangan percaya. akun media sosial pribadi yang dipegang langsung oleh bupati anas hanya di instagram @azwaranas.a3 di mana masyarakat bisa menyampaikan laporan dan sebagainya. adapun milik pemkab banyuwangi di instagram, facebook, dan twitter di mana masyarakat bisa menyampaikan pendapatnya,â€ jelas mujiono. mujiono mengaku mendapat laporan dari sejumlah pihak yang merasa tertipu karena mendapat pesan dari orang yang mengaku â€˜bupati anasâ€™. dia mencontohkan ada koleganya yang mengaku dikirim pesan â€˜bupati anasâ€™ dan dimintai sumbangan untuk anak yatim. â€œuntung orangnya langsung konfirmasi ke saya, dan saya pastikan itu penipuan,â€ jelas mujiono. tak hanya pesan untuk mentransfer uang, sejumlah pengusaha juga menjadi sasaran penipuan. mereka, kata mujiono, mendapat pesan untuk segera menemui bupati anas di banyuwangi. â€œsudah ada tiga orang yang mengalami hal ini. ada yang sudah jalan sampai di probolinggo, baru sadar kalau tertipu. ada yang sudah sampai di banyuwangi. ada juga yang minta pulsa,â€ cerita mujiono. ====== ","  dari hasil penelusuran tim cekfakta tempo , ternyata faktanya peristiwa di dalam ke 3 foto tersebut bukan terjadi di wamena, melainkan terjadi di tangerang, lahore (pakistan), dan palembang pada tahun 2015 dan 2017. berikut penjelasan lengkapnya. foto 1pencarian terhadap foto pertama mengarahkan tempo pada situs wartainfo.com yang pernah mengunggah foto yang identik pada februari 2015 dalam berita yang berjudul â€œ4 fakta hendriansyah, begal motor yang dibakar massa di tangerangâ€. menurut berita itu, hendriansyah dibakar oleh warga di pondok aren, tangerang selatan, karena hendak mencuri motor. pelaku pencurian sebenarnya berjumlah empat orang. tapi tiga pelaku lainnya berhasil kabur.  hendriansyah merupakan warga larangan utara, tangerang. ia dibakar hidup-hidup oleh warga setelah sebelumnya dihajar hingga babak belur. tempo pun mencocokkan berita ini dengan pemberitaan di media arus utama. peristiwa ini diberitakan oleh situs sindonews.com pada 26 februari 2015 dengan judul â€œidentitas begal yang dibakar di pondok aren terungkapâ€. isi berita itu sama dengan apa yang tertulis dalam situs wartainfo.com. sindonews.com menulis nama pelaku pembegalan di pondok aren, tangerang selatan, yang dibakar hidup-hidup pada 24 februari 2015, yakni hendriansyah, terungkap setelah kedua orangtuanya mendatangi kamar mayat rumah sakit umum daerah kabupaten tangerang. dengan demikian, klaim bahwa foto pertama ini merupakan foto peristiwa yang terjadi di wamena adalah keliru. foto 2foto kedua, yang memperlihatkan dua jenazah yang telah gosong karena dibakar massa, ditemukan diunggah pertama kali di forum documentingreality.com pada 17 maret 2015 dalam thread yang berjudul â€œmore photos of the lynchings of two people by a mob of christiansâ€. pengunggah foto yang memakai nama akun orion mystery itu menuliskan keterangan bahwa dua jenazah itu gosong karena dibakar hidup-hidup oleh warga yang marah atas pengeboman dua gereja di lahore, pakistan, pada 15 maret 2015. warga menghakimi dua terduga pelaku itu dengan menghajarnya. akun orion mystery mengunggah 11 foto seri peristiwa itu, yakni sejak massa menghajar kedua terduga pelaku hingga massa membakarnya. belakangan, diketahui bahwa salah satu dari korban yang tewas dibakar tersebut adalah seorang tukang kaca yang tidak terlibat dalam aksi pengeboman gereja itu.   akun tersebut menyertakan tautan berita dari situs koran di pakistan, dawn.com, yang berjudul â€œlahore lynching victim identified as local glass cutterâ€ sebagai "," sebagai berikut : â€œcopasâ€ nanaluc nanalucmengerikan ini baru yang namanya aksi teroris biadab. kejadian di wamena , bagusnya kasus ini aja diangkat terus biar rezim ini sadar apa yang udah di lakukannya dalam melindungi rakyatnya, innalilahi wa innalilahi rojiun semoga mereka yang meninggal husnul khatimahâ€ sumber : https://perma.cc/byz7-8cgj (arsip) â€“ sudah dibagikan 2 kali saat tanngkapan layar diambil. ============================================= "," (1) http://bit.ly/2rhtadc / http://bit.ly/2mxvn7s, first draft news: â€œkonten yang salah ketika konten yang asli dipadankan dengan konteks informasi yang salahâ€. * sumber membagikan video sadick ebrahim yang dirawat di rumah sakit rk khan di chatsworth, afrika selatan. * sumber menambahkan narasi yang tidak sesuai dengan fakta sehingga membangun premis pelintiran, dihubung-hubungkan dengan hal lain yang tidak ada kaitannya dengan konteks video yang sesungguhnya. (2) salah satu artikel yang berkaitan: * ctv news: â€œputra â€˜traumaâ€™ membagikan video belatung di mulut ayah yang dirawat di rumah sakit azaad ebrahim memposting video ke facebook yang menunjukkan belatung di mulut ayahnya, sadick ebrahim, di rumah sakit rk khan di chatsworth, afrika selatan. pihak berwenang afrika selatan telah memerintahkan penyelidikan ke sebuah rumah sakit setelah sebuah video muncul yang menunjukkan belatung merangkak di mulut seorang pasien yang kemudian meninggal. â€¦â€ google translate, selengkapnya di http://bit.ly/2ownmyb / http://archive.fo/xurrr (arsip cadangan). ====== "," yang digunakan oleh sumber. selengkapnya di bagian  â€œmakhluk ini dari india dia selalu gencar menghina islam,adzan di cela,wanita berkerudung di lempari batu dan di bilang kepanasan dsb. dia juga men- tuhankan sapi. inilah baru azab yg pedih di dunia, silahkan nikmati lg azab yg sngat dahsyat di neraka ya. pic.twitter.com/tacmqcfcdpâ€. ====== ",": akun facebook edelwies cleo atau @edelwies.cleo mengunggah sepasang gambar pada facebooknya, sabtu (19/10). gambar pertama atau di sisi kiri adalah mantan pemain sepak bola dari klub real madrid yakni cristiano ronaldo dan kÃ©pler laveran lima ferreira atau pepe. sedangkan gambar kedua ialah seseorang dengan topi baret berwarna merah, berkacamata hitam dengan memegang tongkat komando dan terdapat bendera berlambang polri di belakangnya. dalam gambar pertama, dituliskan narasi berikut, â€œitu siapa bro??? presiden indonesia bro,â€ unggah akun facebook edelwies cleo atau @edelwies.cleo, sabtu (19/10). akun @edelwies.cleo juga menambahkan narasi â€œhahahahaâ€. setelah ditelusuri melalui mesin pencari, diketahui gambar pertama adalah meme yang ramai diunggah warganet saat barcelona gagal lolos ke liga champion 2016 karena kalah agregat dari atletico madrid. meme tersebut pun ditayangkan pada media daring brilio.net. sedangkan untuk gambar kedua adalah suntingan atau bukan foto asli presiden ri, joko widodo (jokowi). diketahui, foto kedua adalah foto kapolri periode 2008 â€“ 2010 yakni bambang hendarso danuri. unggahan yang dibuat akun facebook @edelwies.cleo menurut frist draft dapat dikategorikan sebagai manipulated content atau konten yang dimanipulasi dengan definisinya yaitu, ketika informasi atau gambar yang asli dimanipulasi untuk menipu. ===== ",":  â€œitu siapa bro??? presiden indonesia bro,â€ unggah akun facebook edelwies cleo atau @edelwies.cleo, sabtu (19/10). =====  ","  berdasarkan hasil penelusuran yang dilakukan oleh anggota grup forum anti fitnah, hasut, dan hoax, video tersebut faktanya bukanlah video yang benar-benar terjadi di parkiran gedung dpr seperti yang diklaim oleh akun sumber. video itu nyatanya adalah video buatan oleh youtuber asal republik nikaragua, jjpd producciones. video tersebut diunggah di chanel terverifikasi milik yang bernama jjoaquin perez dan jimmy perez tersebut pada 25 februari 2016. video tersebut diberi judul â€œstrange creature caugth on tape in parking 2016â€ atau yang jika diterjemahkan ke bahasa indonesia artinya ; â€œmakhluk aneh terperangkap dalam rekaman di parkir 2016â€. pada deskripsi, jjpd producciones menuliskan keterangan sebagai berikut : â€œstrange creature caugth on tape in parking 2016.a young man in a parking heading towards his car, he realize that something strangeit hides under a car, the young man takes his smartphone and starts recording allwhat happened in the video (strange creature in parking 2016).â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”jjpd produccionesvideo cgi (computer-generated imagery)â€ cgi atau yang dikenal sebagai computer-generated imagery (cgi; bahasa indonesia: â€œpencitraan yang dihasilkan komputerâ€) adalah penggunaan grafik komputer (atau lebih tepatnya, grafik komputer 3d) dalam efek spesial. cgi digunakan dalam film, acara televisi dan iklan, dan juga media cetak. "," :  â€œaudzu billahi minas syaithonir rojiimâ€¦ tampak terlihat di parkiran gedung dpr â€¦ ternyata benar2 terjadi jin ikut hadir serta dalam agenda pelantikan saudara mereka jokowi-maâ€™ruf bersyukurlah kalian wahai bangsa jin pd allah, krn untuk suatu hikmah yg besar, allah sembunyikan kalian bangsa jin dari pandangan mata bangsa manusia, jika tidak maka kalian akan merasakan betapa bisa sangat ganasnya bangsa manusia yaitu bani adam. wallahu â€˜alamâ€¦â€ sumber : https://perma.cc/fze8-2g45 (arsip) â€“ sudah dibagikan 1898 kali saat tangkapan layar diambil. ============================================= "]


data = np.array(data)
texts = []

for i in range(data.shape[0]):
  text = BeautifulSoup(data[i])
  texts.append(clean_str(str(text.get_text().encode())))

tokenizer = Tokenizer(num_words=MAX_NB_WORDS)
tokenizer.fit_on_texts(texts)
sequences = tokenizer.texts_to_sequences(texts)

word_index = tokenizer.word_index
print('Number of Unique Tokens',len(word_index))

test_sequences = tokenizer.texts_to_sequences(data)
test_cnn_data = pad_sequences(test_sequences, maxlen=MAX_SEQUENCE_LENGTH)

print('Shape of Data Tensor:', test_cnn_data.shape)

indices = np.arange(test_cnn_data.shape[0])
print(indices)
print(np.random.shuffle(indices))
test_cnn_data = test_cnn_data[indices]
x_test = test_cnn_data

#Prediksi
prediksi = model.predict(x_test, batch_size=10, verbose=0)

class_category = ['FAKTA', 'HOAX']

for i in range(prediksi.shape[0]):
  print(str(i) + class_category[prediksi[i].argmax()])