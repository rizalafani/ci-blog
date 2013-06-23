/*
SQLyog Enterprise - MySQL GUI v6.06
Host - 5.5.16 : Database - ci_blog
*********************************************************************
Server version : 5.5.16
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `ci_blog`;

USE `ci_blog`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `captcha` */

DROP TABLE IF EXISTS `captcha`;

CREATE TABLE `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` bigint(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB AUTO_INCREMENT=308 DEFAULT CHARSET=latin1;

/*Data for the table `captcha` */

insert  into `captcha`(`captcha_id`,`captcha_time`,`ip_address`,`word`) values (307,1369401795,'::1','fR7Tsa28');

/*Table structure for table `content` */

DROP TABLE IF EXISTS `content`;

CREATE TABLE `content` (
  `kode_content` int(5) NOT NULL AUTO_INCREMENT,
  `judul_content` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `penulis` varchar(50) DEFAULT NULL,
  `content` text,
  `deskripsi` text,
  `image_header` varchar(200) DEFAULT NULL,
  `tags` text,
  `status` varchar(20) DEFAULT NULL,
  `counter` int(5) DEFAULT NULL,
  `image_detail` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`kode_content`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `content` */

insert  into `content`(`kode_content`,`judul_content`,`tanggal`,`penulis`,`content`,`deskripsi`,`image_header`,`tags`,`status`,`counter`,`image_detail`) values (1,'Belajar Pemrograman Web','2013-05-24 14:25:32','Shohiful Faidilah','<p>setelah memposting tentang java, kali ini ane kasi tutorial pemrograman Web, pemrograman web banyak macam nya diantaranya ada yang pake jsp (Java), ASP, PHP dan yang paling populer untuk saat ini adalah PHP? mangkanya ane kasi tutorial pemrograman web tentang PHP.. kalo yang pengen ASP atau JSP bisa langsung private ke ane atau nunggu postingan selanjut nya, kira2 berapa lama ya ? hehehe mungkin stahun lagi... wkakakakaka oke, persiapan pertama sebelum anda belajar PHP adalah software XAMPP sebagai Web server dan tentunya di XAMPP sudah ada database Mysql nya yaitu phpmyadmin..</p>\r\n\r\n<p>Apakah Anda sedang belajar membuat script CMS sendiri? Jika ya, rasanya belum lengkap deh tanpa fitur yang menampilkan daftar artikel yang terkait dengan sebuah artikel yang sedang dibaca oleh pengunjung blog. Dengan adanya fitur ini, pengunjung akan diarahkan ke artikel lain yang masih berhubungan dengan artikel yang sedang dibacanya sehingga bisa menambah wawasan lebih bagi mereka. Sedangkan efek positif bagi Anda sebagai pemilik situs adalah meningkatnya impression atau page view situs Anda, dan juga membuat visitor lebih tahan berlama-lama untuk menjelajahi situs Anda.</p>\r\n\r\n<p>Apabila Anda menggunakan WordPress atau blogging software yang lain, maka fitur untuk menampilkian artikel terkait ini bisa langsung ditanam menggunakan plugin yang<img alt=\"\" src=\"/ci-blog/asset/webadmin/js/kcfinder/upload/images/contoh%20aplikasi%20php%20sederhana.jpg\" style=\"width: 256px; height: 256px; float: right; margin: 10px;\" /> disediakan, misalnya YARPP. Namun, bagi Anda yang membuat CMS sendiri tentunya hal ini menjadi tantangan tersendiri. Oleh karena itu dalam artikel ini, saya akan mencoba memaparkan ide untuk membuat modul script yang menampilkan artikel terkait dengan PHP.</p>\r\n\r\n<p>Bagian tersebut digunakan untuk menampilkan daftar artikel yang terkait dengan artikel yang sedang dibaca. Untuk menampilkan daftar artikel yang terkait dengan artikel ber ID $idartikel, saya menggunakan sebuah function dengan nama artikelTerkait($idartikel) dimana $idartikel adalah parameternya. Function ini saya letakkan di file function.php yang terpisah dari script artikel.php. Kalaupun Anda meletakkan functionnya dalam file yg sama dengan artikel.php juga tidak ada masalah&nbsp;</p>\r\n\r\n<p>Selanjutnya kita tinjau apa isi dari function artikelTerkait(). Dalam contoh ini, keterkaitan artikel yang dimaksud di sini ditinjau dari kemiripan judul artikelnya. Adapun idenya adalah, kita baca semua judul artikel yang ada dalam database kecuali artikel yang menjadi acuan (artikel ber ID $idartikel). Selanjutnya untuk semua judul artikel ini, kita&nbsp;lihat kemiripannya dengan judul dari artikel yang ber ID $idartikel ini. Kita bisa melihat kemiripan dari judul artikel ini menggunakan function similar_text() yang pernah saya bahas di artikel lain tentang uji kemiripan teks.</p>\r\n\r\n<p>Kemudian, karena hasil dari penggunakan similar_text() ini berupa angka dalam bentuk prosentase kemiripan, maka sebaiknya kita membuat semacam batas minimal prosentase atau threshold, yang nantinya digunakan untuk memberi batas minimal kemiripannya. Sebagai contoh misalkan daftar artikel terkait yang ditampilkan hanya artikel yang memiliki tingkat kemiripan 50% ke atas. Hal ini berfungsi untuk memfilter mana artikel yang benar-benar mirip atau tidak. Artikel yang jauh dari mirip, akan memiliki prosentase kemiripan kecil. Tapi besar kecilnya threshold ini sepenuhnya terserah Anda, karena Andalah yang menentukan.</p>\r\n\r\n<p>Hal yang menjadi pemikiran berikutnya adalah, bagaimana jika jumlah artikel yang terkait itu ada banyak, misalkan ada 100 buah? tentunya tidak mungkin kita tampilkan semua karena halaman page artikelnya bisa jadi penuh dengan judul-judul artikel sehingga tidak menarik bagi pengunjung. Oleh karena itu kita sebaiknya batasi jumlah artikel terkaitnya. Untuk mengimplementasikan hal ini, setiap judul artikel yang kemiripannya di atas threshold, maka kita simpan ke dalam sebuah array. Selama jumlah artikel dalam array tersebut belum memenuhi batas maksimum jumlah artikel nya, maka judul-judul terkait itu bisa ditambahkan dalam array. Setelah proses ini selesai, barulah kita tampilkan list judul artikel terkaitnya yang ada dalam array tersebut.</p>\r\n\r\n<p>Sering dalam sebuah aplikasi web khususnya php, kita melakukan operasi database mysql secara berulang. Misal melakukan pengecekan, perhitungan, perbandingan ataupun operasi-operasi umum lainya yang dilibatkan dalam sebuah proses besar. Hal ini sangat tidak efektif karena kita harus menyusunya berulang-ulang yang kadang berujung pada sulitnya melakukan pengembangan. Pada tulisan ini saya akan berbagi trik jitu agar masalah diatas bisa teratasi dengan mudah.</p>\r\n\r\n<p>Sebelum saya kasih tricknya saya kasih gambaran dulu masalahnya.</p>\r\n\r\n<p>Misal anda ingin membangun sebuah aplikasi pegawai. Dalam aplikasi pegawai tersebut anda akan melakukan banyak proses pengecekan keberadaan pegawai, jumlah pegawai berdasar gender, jumlah pegawai berdasar umur, jumlah pegawai yang sudah menikah dll. Untuk melakukan hal-hal tersebut diatas, tentunya dalam programming php anda akan melakukan proses secara berulang, yang tentunya harus menyusun script php lumayan banyak.</p>\r\n','Pemrograman Web deskripsi','/ci-blog/asset/webadmin/js/kcfinder/upload/images/php.jpg','aplikasi web,belajar web','publish',17,NULL),(2,'Contoh CRUD Java','2013-05-24 13:35:43','Shohiful Faidilah','<p>Postingan kali ini ane mau bahas tentang pemrograman Java, kalo sebelumnya ane kasi Contoh Aplikasi CRUD C# kali ini CRUD java.. tentunya ente sudah tau kan CRUD itu apa? CRUD adalah bentuk dari DDL dan DML dari database? apa itu DDL dan DML ? wah kalo di bahas disini bisa panjang... ente tentunya bisa cari di blog lain yang membahas tentang Mysql kalo ente belum tau tentang DDl dan DML... oke, Guys, langsung aje ya ke contoh CRUD Java nya... :)&nbsp;</p>\r\n\r\n<p>Java adalah sebuah bahasa pemrograman komputer kompilasi bytecode yang tidak bergantung pada sistem operasi atau platform dan termasuk berbasis pada object oriented programming.</p>\r\n\r\n<p>Sejarah singkat Java</p>\r\n\r\n<p>Java diciptakan setelah C++ oleh Sun microsystems.<br />\r\nProyek Java dimulai tahun 1991 oleh sejumlah insinyur pada perusahaan Sun Microsystem Inc, dengan ide menggunakan bahasa komputer yang tidak mengacu pada sebuah arsitektur. Proyek ini diberi kode sandi Green.<br />\r\nTahun 1992, proyek Green meluncurkan produk pertama &#39; *7 &#39;.<br />\r\nTahun 1993 dan separuh th 1994, berganti nama First Person, tetapi bubar.<br />\r\nTahun 1995, dibuatlah browser yang mampu menerjemahkan kodebyte tingkat menengah. Dan bahasa Java mulai digunakan secara luas.<br />\r\nBeberapa sifat-sifat / Karakteristik bahasa Java antara lain :</p>\r\n\r\n<p>Platform Independence. Dapat dipindah-pindahkan di antara bermacam-macam platform dan SO. Begitu pula sourcecode-nya.<br />\r\nProgram yang dihasilkan dalam bahasa Java dapat berupa applet (aplikasi kecil yang jalan di atas web browser).<br />\r\nBerupa aplikasi mandiri yang dijalankan dengan program Java Interpreter.<br />\r\nSetiap program yang ditulis dalam bahasa Java, hasil kompilasinya berupa bytecode, yaitu sekumpulan instruksi yang terlihat seperti kode mesin, tetapi tidak spesifik untuk satu jenis prosessor tertentu.<br />\r\nBerbasis Object Oriented Programming.<br />\r\nDan masih banyak lagi.<br />\r\nKeunggulan Java :</p>\r\n\r\n<p>Sederhana<br />\r\nBerorientasi Object<br />\r\nTerdistribusi<br />\r\nKuat / Robust = mengurangi bug / error<br />\r\nAman = memungkinkan bebas virus<br />\r\nNetral Arsitektur = mudah diterjemahkan<br />\r\nPortable<br />\r\nInterpreter = diakses komputer yang memiliki interpreter.<br />\r\nKinerja tinggi<br />\r\nMultithreaded = melakukan lebih dari satu pekerjaan.<br />\r\nDinamis = mudah diadaptasikan untuk lingkungan yang akan berkembang.<br />\r\nJava dengan bahasa yang lain :</p>\r\n\r\n<p>Java tidak sama dengan Javascript, salah satu contoh perbedaannya adalah javascript hanya terbatas pada fungsi browser, sedang Java mirip syntax dengan C++. Tetapi syntax Java tidak memerlukan header file, pointer arithmatic, struktur, union, operator overlading, class virtual dan lain-lain. Perancang tidak memperbaiki beberapa kelemahan pada C++, seperti switch statemen. Jika kita mengenal C++ dengan baik, akan lebih memudahkan berpindah ke syntax Java.<br />\r\nJika kita menguasai Visual Basic, kita tidak berpendapat bahwa Java sederhana. Akan ada banyak syntax asing. Yang menarik di Visual Basic adalah lingkungan perancangan visual yang harus diprogram secara manual di Java.<br />\r\nArsitektur Java<br />\r\nArsitektur Java adalah kombinasi dari 4 komponen yaitu :</p>\r\n\r\n<p>Java Programming Language<br />\r\nJava Class file Format<br />\r\nJava Application Programming Interface (APIs)<br />\r\nJava Virtual Machine (JVM)<br />\r\nJava Virtual Machine (JVM)</p>\r\n\r\n<p>JVM adalah mesin computing abstrak yang menerjemahkan kompiler program Java/jembatan antara program dan keunikan platform.<br />\r\nJVM menyembunyikan kompleksitas platform dari program yang kita buat dan merupakan jantung program.<br />\r\nSecara sekilas lapisan tambahan tersebut menyebabkan aplikasi berjalan lambat dibanding aplikasi platform. Namun sekarang telah dikenal Just In Time (JIT) compiler. JIT ini membaca program java, dan segera melakukan kompilasi terhadap program java tersebut menjadi program spesifik platform. Contoh JVM pada web browser, begitu web browser misal Netscape menerima applet, ia akan mengkompilenya dengan JT (optimasi JIT dilakukan oleh para vendor).<br />\r\nFormat File Class Java</p>\r\n\r\n<p>JVM tidak dapat langsung menerjemahkan ke Java Programming language atau API sekalipun.<br />\r\nDalam Java, misalkan kita mengetik kode dengan text editor favorit, kemudian menyimpannya sebagai file dengan ekstensi Java. Lalu Java kompiler kita mengkompilasi kode tersebut menjadi Java Bytecode, tersimpan dalam ekstensi Calass. Java bytecode tersebut akan ditangani untuk dieksekusi oleh JVM yang saat ini ada dua modus dengan atau tanpa JIT. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br />\r\nJava Programming Language (Bahasa aplikasi program Java)</p>\r\n\r\n<p><img alt=\"\" src=\"/ci-blog/asset/webadmin/js/kcfinder/upload/images/images%20java.jpg\" style=\"width: 246px; height: 205px; float: right; margin: 10px;\" /></p>\r\n\r\n<p>Bahasa Program ini lebih mengacu pada core java programming. Diantaranya termasuk :</p>\r\n\r\n<p>Method, Interface and class design, Threading, Even Handling, Perfomance and memory management, Controlling Access to Resources.<br />\r\nAplication Programming Interface&#39;s (API&#39;s)<br />\r\nBeberapa Edisi program Aplikasi (API - Aplication Programming Interface)</p>\r\n\r\n<p>J2SE - Java 2 Standard Edition - Platform ini berisikan paket Java standar dan GUI dalam Standard Edition mencakup :<br />\r\n1. Swing Components (paket komponen aplikasi java dalam<br />\r\n&nbsp; &nbsp; direktori JTree C : /<br />\r\n2. J2sdkee 1.2.1 = java 2 SDK software platform.<br />\r\n3. JavaStuff<br />\r\n4. Jdk_1.3 = Java Development Kit, JRE termasuk di dalamnya.<br />\r\n5. Jsse 1.0.1<br />\r\n6. Data transfer API<br />\r\n7. Printing API<br />\r\n8. JDBC<br />\r\n9. JNI (Java and nonjava code interface), dll<br />\r\nJ2EE - Java 2 Enterprise Edition - Paket ini berisikan develop aplikasi berbasis web.<br />\r\nJ2ME - Java 2 Micro Edition - Untuk produk konsumer lingkungan teknologi mobile.<br />\r\n&nbsp;<br />\r\nPEMROGRAMAN BERBASIS OBJEK (OOP)</p>\r\n\r\n<p>Java adalah bahasa yang termasuk dalam pemrograman berorientasi object. Berbandingan anologi aliran dan interaksi antar object antara Structured Procedural Programming (Basic, Pascal, C etc).</p>\r\n\r\n<p>Ide tentang Object Oriented</p>\r\n\r\n<p>Object mempresentasikan entitas pada dunia nyata. Dalam membuat mobil kita dimulai dari memecah-mecah kompleksitas sistem mobil ke dalam bagian kecil, seperti roda, kemudi, dan sebagainya.</p>\r\n\r\n<p>Pada masing-masing bagian kecil itu kita definisikan field-field, seperti warna atau daya cengkeram. Selain itu, kita definisikan apa saja yang bisa dilakukan terhadap bagian-bagian itu. Perintah-perintah yang bisa diterima itu disebut method.</p>\r\n\r\n<p>Antarmuka dalam interaksi antar obyek tersebut adalah method-method yang dimiliki object. Objek-objek itu berinteraksi dengan saling memanggil method dari suatu objek, atau sering disebut message passing.</p>\r\n\r\n<p>Tiga Pilar OOP :</p>\r\n\r\n<p>Encapsulation<br />\r\nTerdiri dari method-method dalam Class, tahapnya meliputi Constructor dan Destructor.<br />\r\nInheritance (Pewarisan Sifat)<br />\r\nDengan inheritance, pengembang software dapat bekerja lebih efesien dan lebih cepat. Berkat inheritance, dapat digunakan definisi class yang sudah pernah dibuat sebelumnya untuk membuat class-class lain yang menyerupai class tersebut.<br />\r\nPolymorphism<br />\r\nPolymorphism didefiniskan sebagai kemampuan beberapa objek bertipe sama, bereaksi secara berbeda terhadap message yang sama.<br />\r\nObject dan Class</p>\r\n\r\n<p>Class adalah template untuk obyek-obyek yang memiliki sifat yang sama. Dalam menulis program yang berorientasi objek yang sebenarnya melainkan class dari objek tersebut.</p>\r\n\r\n<p>Instance adalah kata lain dari objek. Dalam bahasa OOP kita harus terlebih dahulu membuat instance dari class tersebut. Jika Class adalah representasi generik dari objek, instance adalah representasi konkritnya.</p>\r\n\r\n<p>Bahasa Java telah menyediakan Class Library, yaitu kumpulan class-class yang telah siap digunakan untuk membuat program-program baru. Class Library telah menyediakan class-class dasar seperti fungsi matematika, array string dan sebagainya hingga ke class untuk graphic, networking dan terutama internetworking (berbasis protokol TCP/IP).</p>\r\n\r\n<p>Tujuan &amp; Keuntungan dari Analis Berorientasi Obyek :</p>\r\n\r\n<p>Lebih memahami inti permasalahan.<br />\r\nDalam mengorganisasi analis dan spesifikasi dengan metode yang digunakan cara berpikir manusia.<br />\r\nMengurangi jarak antara aktivitas analis yang berbeda dengan membuat atribut dan metode menjadi menjadi satu kesatuan.<br />\r\nPewarisan dapat dilakukan dengan memberikan identifikasi sesuatu yang umum pada atribut dan metode.<br />\r\nMenjaga stabilitas atas perubahan kebutuhan pada system yang sama.<br />\r\nHasil analisis dapat digunakan kembali.<br />\r\nMenghasilkan penggambaran yang konsisten.</p>\r\n','CRUD Java Keyword','/ci-blog/asset/webadmin/js/kcfinder/upload/images/java.jpg','','publish',11,NULL),(3,'Belajar Codeigniter untuk pemula','2013-05-24 13:34:14','Shohiful Faidilah','<p>CodeIgniter adalah aplikasi open source yang berupa framework dengan model MVC (Model, View, Controller) untuk membangun website dinamis dengan menggunakan PHP. CodeIgniter memudahkan developer untuk membuat aplikasi web dengan cepat dan mudah dibandingkan dengan membuatnya dari awal. CodeIgniter dirilis pertama kali pada 28 Februari 2006. Versi stabil terakhir 2.1.2 yang dirilis pada 29 Juni 2012. misdasari&nbsp;</p>\r\n\r\n<p>Framework secara sederhana dapat diartikan kumpulan dari fungsi-fungsi/prosedur-prosedur dan class-class untuk tujuan tertentu yang sudah siap digunakan sehingga bisa lebih mempermudah dan mempercepat pekerjaan seorang programer, tanpa harus membuat fungsi atau class dari awal.<br />\r\nAda beberapa alasan mengapa menggunakan Framework:<br />\r\nMempercepat dan mempermudah pembangunan sebuah aplikasi web.&nbsp;Relatif memudahkan dalam proses maintenance karena sudah ada pola tertentu dalam sebuah framework (dengan syarat programmer mengikuti pola standar yang ada)<br />\r\nUmumnya framework menyediakan fasilitas-fasilitas yang umum dipakai sehingga kita tidak perlu membangun dari awal (misalnya validasi, ORM, pagination, multiple database, scaffolding, pengaturan session, error handling, dll&nbsp;Lebih bebas dalam pengembangan jika dibandingkan CMS&nbsp;Design Patern: MVC (Model, View, Controller) [sunting]</p>\r\n\r\n<p><img alt=\"\" src=\"/ci-blog/asset/webadmin/js/kcfinder/upload/images/tutorial%20codeigniter%20-%20aplikasi%20crud%20sederhana.png\" style=\"width: 231px; height: 274px; float: left; margin: 10px;\" /></p>\r\n\r\n<p>Model View Controller merupakan suatu konsep yang cukup populer dalam pembangunan aplikasi web, berawal pada bahasa pemrograman Small Talk, MVC memisahkan pengembangan aplikasi berdasarkan komponen utama yang membangun sebuah aplikasi seperti manipulasi data, user interface, dan bagian yang menjadi kontrol aplikasi. Terdapat 3 jenis komponen yang membangun suatu MVC pattern dalam suatu aplikasi yaitu :<br />\r\nView, merupakan bagian yang menangani presentation logic. Pada suatu aplikasi web bagian ini biasanya berupa file template HTML, yang diatur oleh controller. View berfungsi untuk menerima dan merepresentasikan data kepada user. Bagian ini tidak memiliki akses langsung terhadap bagian model.<br />\r\nModel, biasanya berhubungan langsung dengan database untuk memanipulasi data (insert, update, delete, search), menangani validasi dari bagian controller, namun tidak dapat berhubungan langsung dengan bagian view.<br />\r\nController, merupakan bagian yang mengatur hubungan antara bagian model dan bagian view, controller berfungsi untuk menerima request dan data dari user kemudian menentukan apa yang akan diproses oleh aplikasi.<br />\r\nDengan menggunakan prinsip MVC suatu aplikasi dapat dikembangkan sesuai dengan kemampuan developernya, yaitu programmer yang menangani bagian model dan controller, sedangkan designer yang menangani bagian view, sehingga penggunaan arsitektur MVC dapat meningkatkan maintanability dan organisasi kode. Walaupun demikian dibutuhkan komunikasi yang baik antara programmer dan designer dalam menangani variabel-variabel yang akan ditampilkan.<br />\r\nAda beberapa kelebihan CodeIgniter (CI) dibandingkan dengan Framework PHP lain,<br />\r\nPerforma sangat cepat : salah satu alasan tidak menggunakan framework adalah karena eksekusinya yang lebih lambat daripada PHP from the scracth, tapi Codeigniter sangat cepat bahkan mungkin bisa dibilang codeigniter merupakan framework yang paling cepat dibanding framework yang lain.<br />\r\nKonfigurasi yang sangat minim (nearly zero configuration) &nbsp;: tentu saja untuk menyesuaikan dengan database dan keleluasaan routing tetap diizinkan melakukan konfigurasi dengan mengubah beberapa file konfigurasi seperti database.php atau autoload.php, namun untuk menggunakan codeigniter dengan setting standard, anda hanya perlu merubah sedikit saja file pada folder config.<br />\r\nBanyak komunitas: dengan banyaknya komunitas CI ini, memudahkan kita untuk berinteraksi dengan yang lain, baik itu bertanya atau teknologi terbaru.<br />\r\nDokumentasi yang sangat lengkap : Setiap paket instalasi codeigniter sudah disertai user guide yang sangat bagus dan lengkap untuk dijadikan permulaan, bahasanya pun mudah dipahami.<br />\r\nDan banyak lagi yang lainnya.</p>\r\n','contoh aplikasi sederhana codeigniter, website code igniter, tutorial codeigniter','/ci-blog/asset/webadmin/js/kcfinder/upload/images/codeigniterwallpaper.jpg','belajar codeigniter,tutorial codeigniter','publish',8,NULL);

/*Table structure for table `content_label` */

DROP TABLE IF EXISTS `content_label`;

CREATE TABLE `content_label` (
  `kode_label` int(5) NOT NULL DEFAULT '0',
  `kode_content` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kode_content`,`kode_label`),
  KEY `kode_label` (`kode_label`),
  CONSTRAINT `content_label_ibfk_1` FOREIGN KEY (`kode_content`) REFERENCES `content` (`kode_content`),
  CONSTRAINT `content_label_ibfk_2` FOREIGN KEY (`kode_label`) REFERENCES `label` (`kode_label`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `content_label` */

insert  into `content_label`(`kode_label`,`kode_content`) values (1,1),(1,3),(2,2),(3,1),(3,3),(4,1),(4,3);

/*Table structure for table `komentar` */

DROP TABLE IF EXISTS `komentar`;

CREATE TABLE `komentar` (
  `kode_comment` int(7) NOT NULL AUTO_INCREMENT,
  `kode_content` int(5) DEFAULT NULL,
  `isi` text,
  `status` varchar(30) DEFAULT NULL,
  `pengirim` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  PRIMARY KEY (`kode_comment`),
  KEY `kode_content` (`kode_content`),
  CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`kode_content`) REFERENCES `content` (`kode_content`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `komentar` */

insert  into `komentar`(`kode_comment`,`kode_content`,`isi`,`status`,`pengirim`,`website`,`email`,`tanggal`) values (1,1,'Mantap Gannnzzzz..\r\nxixixixiixi','publish','fandi',NULL,'fandix@ymail.com',NULL),(2,1,'Sangat Membantu blognya..','publish','erika',NULL,'erikagirl@gmail.com',NULL),(4,1,'@fandi & @erika : terima kasih','publish','Shohiful Faidilah','calonpresident.blogspot.com',NULL,'2013-05-17 19:41:18'),(5,1,'Ini web nya ngambil dari contoh program d blog ku ya ??\r\nwkwkwkwkkwwk','pending','Rizal Afani','calonpresident.blogspot.com','ahmadrizalafani@gmail.com','2013-05-19 07:24:58'),(6,3,'Kok gak ada Contentnya ??? ','pending','Rizal Afani','calonpresident.blogspot.com','ahmadrizalafani@gmail.com','2013-05-20 02:45:59'),(7,3,'malah kosong (-_-&quot;)','pending','Nur Layla','laylamajnun.wordpress.com','layla.stikom@gmail.com','2013-05-20 02:49:05');

/*Table structure for table `label` */

DROP TABLE IF EXISTS `label`;

CREATE TABLE `label` (
  `kode_label` int(5) NOT NULL AUTO_INCREMENT,
  `judul_label` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kode_label`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `label` */

insert  into `label`(`kode_label`,`judul_label`) values (1,'PHP'),(2,'Java'),(3,'Web'),(4,'Framework PHP');

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `kode_blog` int(4) NOT NULL AUTO_INCREMENT,
  `judul_blog` text,
  `deskripsi_blog` text,
  `limit_content` int(3) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `facebook_fans_page` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `g_plus` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `information` text,
  PRIMARY KEY (`kode_blog`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `setting` */

insert  into `setting`(`kode_blog`,`judul_blog`,`deskripsi_blog`,`limit_content`,`facebook`,`facebook_fans_page`,`twitter`,`g_plus`,`email`,`information`) values (1,'Contoh aplikasi blog / weblog/ website dengan codeigniter','ini cuma contoh deskripsi dari saya',2,'https://www.facebook.com/Ahmad.Rizal.Afani','https://www.facebook.com/StikomBanyuwangi','https://twitter.com/Rizal_afani','https://plus.google.com/u/0/112271661378486753881','ahmadrizalafani@gmail.com','<p>Telp : 087755925565</p>\r\n\r\n<p>Kampus : STIKOM PGRI Banyuwangi, Jl Ahmad Yani no 80</p>\r\n');

/*Table structure for table `userapp` */

DROP TABLE IF EXISTS `userapp`;

CREATE TABLE `userapp` (
  `kode_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `g_plus` varchar(200) DEFAULT NULL,
  `about` text,
  PRIMARY KEY (`kode_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `userapp` */

insert  into `userapp`(`kode_user`,`username`,`password`,`nama_lengkap`,`facebook`,`twitter`,`g_plus`,`about`) values (1,'ahmad_rizal','rizal afani','Ahmad Rizal Afani',NULL,NULL,NULL,NULL),(2,'nur_faradis','faradis winda','Nur Muhammad Faradis',NULL,NULL,NULL,NULL),(3,'f_shohiful','cinta','Shohiful Faidilah','https://www.facebook.com/shohiful.faidilah','https://twitter.com/shohifulfaidila','','Seorang yang bergelut dalam dunia Fotografi dan videografi'),(4,'scr_panjoel','kumpo','Asharul Fahrizi','','','',NULL);

/*Table structure for table `visitor` */

DROP TABLE IF EXISTS `visitor`;

CREATE TABLE `visitor` (
  `no` int(7) NOT NULL AUTO_INCREMENT,
  `ip` varchar(40) DEFAULT NULL,
  `os` varchar(40) DEFAULT NULL,
  `browser` varchar(40) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `visitor` */

insert  into `visitor`(`no`,`ip`,`os`,`browser`,`tanggal`) values (1,'::1','Unknown Windows OS','Chrome 26.0.1410.64','2013-05-19 14:15:54'),(2,'::1','Unknown Windows OS','Chrome 26.0.1410.64','2013-05-19 14:30:46'),(3,'::1','Unknown Windows OS','Chrome 26.0.1410.64','2013-05-19 14:32:37'),(4,'::1','Unknown Windows OS','Chrome 26.0.1410.64','2013-05-19 14:47:53'),(5,'::1','Unknown Windows OS','Chrome 26.0.1410.64','2013-05-19 14:49:38'),(6,'::1','Unknown Windows OS','Chrome 26.0.1410.64','2013-05-19 14:56:37'),(7,'::1','Unknown Windows OS','Chrome 26.0.1410.64','2013-05-19 15:00:07'),(8,'::1','Unknown Windows OS','Chrome 26.0.1410.64','2013-05-19 15:04:06'),(9,'::1','Unknown Windows OS','Chrome 26.0.1410.64','2013-05-19 15:24:03'),(10,'::1','Unknown Windows OS','Chrome 26.0.1410.64','2013-05-19 15:27:45'),(11,'::1','Unknown Windows OS','Chrome 26.0.1410.64','2013-05-19 15:29:06'),(12,'::1','Unknown Windows OS','Chrome 26.0.1410.64','2013-05-19 15:32:28'),(13,'::1','Unknown Windows OS','Chrome 26.0.1410.64','2013-05-19 15:42:57'),(14,'::1','Unknown Windows OS','Chrome 27.0.1453.93','2013-05-24 13:16:42');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
