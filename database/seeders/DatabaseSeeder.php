<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Administrator Account
        User::updateOrCreate(
            ['email' => 'admin@akuntanindonesia.id'],
            [
                'name' => 'Administrator Akuntan.ID',
                'password' => Hash::make('AdminAkuntan2026!'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Articles (Edukasi Regulasi)
        $articles = [
            [
                'slug' => 'panduan-coretax-djp-bagi-umkm-dan-perusahaan',
                'title' => 'Panduan Coretax DJP Terbaru: Apa yang Wajib Dipersiapkan Pelaku Usaha?',
                'category' => 'Regulasi Pajak',
                'date_formatted' => '04 September 2026',
                'read_time' => '4 menit baca',
                'author' => 'Hendra Setiyawan, S.E., M.Ak., Ak., CA',
                'author_role' => 'Managing Partner & Kuasa Hukum Pengadilan Pajak',
                'excerpt' => 'Sistem Coretax DJP mengintegrasikan 21 proses bisnis administrasi perpajakan secara penuh. Pelajari dampaknya terhadap pelaporan SPT Masa dan Validasi NIK-NPWP bisnis Anda.',
                'highlights' => [
                    'Integrasi penuh 21 proses bisnis DJP ke dalam satu portal digital terpusat.',
                    'NPWP 16 digit berbasis NIK untuk Orang Pribadi dan format 16 digit untuk Badan.',
                    'Layanan deposit pajak otomatis (tax deposit) untuk kemudahan kompensasi lebih bayar.',
                    'Pentingnya audit data transaksi harian sebelum diunggah ke Coretax.',
                ],
                'content' => '
                    <p>Implementasi sistem <strong>Core Tax Administration System (Coretax)</strong> oleh Direktorat Jenderal Pajak (DJP) menandai babak baru otomatisasi perpajakan nasional. Tidak hanya menggantikan platform DJP Online terdahulu, Coretax menyatukan puluhan aplikasi terpisah (e-Faktur, e-Bupot, e-Billing, dan e-Filing) menjadi satu ekosistem terpadu.</p>
                    
                    <h2>Mengapa Coretax Begitu Krusial bagi Bisnis Anda?</h2>
                    <p>Bagi pelaku UMKM maupun perusahaan berbadan hukum (CV/PT), Coretax menuntut interoperabilitas data yang jauh lebih akurat dan presisi. Jika sebelumnya wajib pajak dapat melakukan pembetulan faktur atau SPT secara terpisah dengan jeda waktu panjang, di Coretax seluruh transaksi terekam secara <em>near real-time</em>.</p>

                    <div class="article-callout-box">
                        <h4>💡 Catatan Penting Akuntan:</h4>
                        <p>Kini setiap ketidaksesuaian antara Faktur Pajak Masukan, Faktur Pajak Keluaran, dan mutasi perbankan dapat memicu deteksi anomali otomatis oleh sistem algoritma DJP. Kesiapan pembukuan sejak dini adalah kunci pencegahan denda administrasi.</p>
                    </div>

                    <h2>4 Hal Pokok yang Wajib Segera Dipersiapkan</h2>
                    <ul>
                        <li><strong>Validasi NIK-NPWP 16 Digit:</strong> Pastikan master data seluruh vendor, supplier, dan karyawan telah tervalidasi menggunakan format 16 digit agar faktur pajak masukan dapat dikreditkan.</li>
                        <li><strong>Standardisasi Kode Transaksi:</strong> Penyesuaian kode klasifikasi lapangan usaha (KLU) dan pemetaan akun pajak (chart of accounts).</li>
                        <li><strong>Pemanfaatan Fitur Tax Deposit:</strong> Mempelajari mekanisme akun deposit saldo pajak untuk pembayaran kewajiban masa secara fleksibel.</li>
                        <li><strong>Integrasi Software Akuntansi Cloud:</strong> Menghubungkan software ERP atau pencatatan transaksi kas ke skema ekspor data standar Coretax.</li>
                    </ul>

                    <h2>Langkah Pendampingan bersama Akuntan Indonesia .ID</h2>
                    <p>Tim kami telah mempersiapkan arsitektur pelaporan pembukuan yang 100% kompatibel dengan Coretax. Mulai dari rekonsiliasi data historis, validasi bukti potong, hingga simulasi pelaporan SPT Masa siap kami kawal agar bisnis Anda beroperasi dengan tenang dan tanpa hambatan regulasi.</p>
                ',
                'tags' => ['Coretax DJP', 'Regulasi Pajak', 'Digital Tax', 'SPT Masa', 'Kepatuhan Hukum'],
                'is_published' => true,
                'views' => 1420,
            ],
            [
                'slug' => 'trik-kelola-pembukuan-umkm-bebas-pusing',
                'title' => '5 Kesalahan Fatal Pembukuan Bisnis UMKM yang Sering Memicu Denda Pajak',
                'category' => 'Tips Akuntansi',
                'date_formatted' => '28 Agustus 2026',
                'read_time' => '5 menit baca',
                'author' => 'Tim Riset Akuntan Indonesia .ID',
                'author_role' => 'Senior Financial Advisory',
                'excerpt' => 'Mencampur rekening pribadi dan operasional adalah kesalahan fatal. Simak cara memisahkan cash flow agar terhindar dari denda dan surat SP2DK DJP.',
                'highlights' => [
                    'Rekening bercampur membuat analisis laba bersih menjadi bias dan memicu kecurigaan fiskus.',
                    'Kuitansi tanpa nomor dan tanggal menyulitkan pembuktian saat pemeriksaan pajak.',
                    'Penyusutan aset sering dilupakan padahal dapat menjadi biaya pengurang penghasilan kena pajak yang sah.',
                    'Rekonsiliasi bank bulanan mutlak dilakukan maksimal tiap tanggal 5.',
                ],
                'content' => '
                    <p>Banyak pengusaha UMKM memiliki produk yang laris dan omzet ratusan juta per bulan, namun di akhir tahun bingung mengapa saldo tabungan tidak bertambah, atau bahkan dikejutkan dengan surat teguran dari kantor pajak. Mayoritas akar masalahnya bukan pada penjualan, melainkan pada <strong>tata kelola pembukuan yang rapuh</strong>.</p>

                    <h2>1. Mencampur Rekening Pribadi dan Rekening Bisnis</h2>
                    <p>Inilah kesalahan nomor satu para pelaku usaha rintisan. Ketika rekening kas toko bercampur dengan kebutuhan rumah tangga, biaya operasional sebenarnya menjadi kabur. Selain itu, mutasi masuk di rekening pribadi Anda rentan dianggap sebagai <em>penghasilan yang belum dilaporkan</em> oleh Account Representative (AR) pajak saat dilakukan pengawasan.</p>

                    <h2>2. Tidak Mengarsipkan Bukti Transaksi Secara Digital</h2>
                    <p>Nota kertas yang terkena panas akan pudar dalam hitungan bulan. Tanpa bukti fisik atau scan invoice yang sah, biaya-biaya operasional yang telah Anda keluarkan berisiko tidak dapat diakui sebagai biaya fiskal (<em>non-deductible expense</em>).</p>

                    <h2>3. Mengabaikan Rekonsiliasi Bank Bulanan</h2>
                    <p>Rekonsiliasi adalah mencocokkan catatan transaksi di buku kas dengan mutasi rekening koran bank. Perbedaan selisih beberapa ratus ribu rupiah yang dibiarkan menumpuk selama setahun akan menjadi momok menakutkan saat penyusunan SPT Tahunan.</p>

                    <div class="article-callout-box">
                        <h4>🎯 Solusi Cepat untuk Pelaku Usaha:</h4>
                        <p>Gunakan sistem <em>accounting outsourcing</em> profesional. Anda cukup menyerahkan foto nota dan mutasi rekening via WhatsApp tiap akhir bulan, tim akuntan kami yang akan merapikan jurnal, laba rugi, dan neraca secara berkala.</p>
                    </div>

                    <h2>4. Menganggap Pembukuan Hanya Perlu di Akhir Tahun</h2>
                    <p>Pembukuan sistem "kebut semalam" di bulan Maret menjelang batas lapor SPT Badan hampir pasti menghasilkan data yang tidak akurat, biaya siluman, dan potensi koreksi fiskal yang besar. Jadwalkan review bulanan agar kesehatan arus kas selalu terpantau.</p>
                ',
                'tags' => ['Pembukuan UMKM', 'Cash Flow', 'Manajemen Keuangan', 'Tips Akuntansi'],
                'is_published' => true,
                'views' => 980,
            ],
            [
                'slug' => 'aturan-pph-final-setengah-persen-uu-hpp',
                'title' => 'Aturan PPh Final 0.5% & Fasilitas Bebas Pajak Omzet Rp 500 Juta Menurut UU HPP',
                'category' => 'Perpajakan UMKM',
                'date_formatted' => '15 Agustus 2026',
                'read_time' => '3 menit baca',
                'author' => 'Hendra Setiyawan, S.E., M.Ak., Ak., CA',
                'author_role' => 'Managing Partner & Kuasa Hukum Pengadilan Pajak',
                'excerpt' => 'Berdasarkan UU HPP & PP 55/2022, wajib pajak orang pribadi UMKM menikmati fasilitas bebas pajak untuk omzet hingga Rp 500 juta per tahun. Bagaimana mekanismenya?',
                'highlights' => [
                    'Wajib Pajak Orang Pribadi UMKM mendapat pembebasan pajak untuk omzet akumulatif s.d. Rp 500 juta per tahun.',
                    'Pajak 0.5% hanya dihitung dari kelebihan omzet di atas Rp 500 juta.',
                    'Badan Usaha (PT & CV) tidak mendapatkan fasilitas bebas Rp 500 juta, melainkan langsung 0.5% dari omzet bruto.',
                    'Terdapat batasan jangka waktu pemanfaatan tarif PPh Final UMKM.',
                ],
                'content' => '
                    <p>Undang-Undang Harmonisasi Peraturan Perpajakan (UU HPP) bersama Peraturan Pemerintah Nomor 55 Tahun 2022 memberikan angin segar yang sangat signifikan bagi para pengusaha mikro dan kecil di seluruh Indonesia, khususnya yang berbentuk Wajib Pajak Orang Pribadi.</p>

                    <h2>Mekanisme Ambang Batas Omzet Rp 500 Juta Tidak Kena Pajak</h2>
                    <p>Untuk wajib pajak orang pribadi yang memiliki omzet bruto di bawah Rp 4,8 Miliar setahun, penghasilan bruto sampai dengan <strong>Rp 500.000.000 (lima ratus juta rupiah)</strong> dalam satu tahun pajak <strong>tidak dikenai Pajak Penghasilan (PPh)</strong>.</p>

                    <div class="article-callout-box">
                        <h4>📊 Contoh Simulasi Perhitungan:</h4>
                        <p>Jika Toko Online Anda membukukan omzet Rp 70.000.000 setiap bulan:</p>
                        <ul>
                            <li>Bulan 1 s.d. Bulan 7 (Total Omzet Rp 490 Juta): PPh Final = <strong>Rp 0 (Bebas Pajak)</strong>.</li>
                            <li>Bulan 8 (Omzet kumulatif jadi Rp 560 Juta): PPh Final dihitung hanya dari kelebihan di atas Rp 500 juta, yaitu Rp 60 Juta × 0.5% = <strong>Rp 300.000</strong>.</li>
                            <li>Bulan 9 s.d. 12: Dikenakan 0.5% penuh dari omzet per bulan.</li>
                        </ul>
                    </div>

                    <h2>Berapa Lama Fasilitas Ini Dapat Digunakan?</h2>
                    <p>Ingat, skema PPh Final 0.5% memiliki batas waktu berlakunya izin tarif:</p>
                    <ul>
                        <li><strong>Wajib Pajak Orang Pribadi:</strong> Maksimal 7 tahun pajak.</li>
                        <li><strong>Wajib Pajak Koperasi, CV, atau Firma:</strong> Maksimal 4 tahun pajak.</li>
                        <li><strong>Wajib Pajak Perseroan Terbatas (PT):</strong> Maksimal 3 tahun pajak.</li>
                    </ul>
                    <p>Setelah masa berlaku habis, wajib pajak diwajibkan menyelenggarakan pembukuan penuh dan menggunakan tarif umum PPh Pasal 17. Konsultasikan transisi pembukuan bisnis Anda bersama tim Akuntan Indonesia .ID agar tidak kaget saat masa berlaku berakhir.</p>
                ',
                'tags' => ['PPh Final 0.5%', 'UU HPP', 'Pajak UMKM', 'PP 55 2022'],
                'is_published' => true,
                'views' => 1120,
            ],
            [
                'slug' => 'cara-cerdas-merespons-surat-sp2dk-pajak',
                'title' => 'Menerima Surat SP2DK dari Kantor Pajak? Ini 5 Langkah Menjawabnya Secara Sah & Aman',
                'category' => 'Litigasi & Solusi',
                'date_formatted' => '10 Agustus 2026',
                'read_time' => '6 menit baca',
                'author' => 'Hendra Setiyawan, S.E., M.Ak., Ak., CA',
                'author_role' => 'Managing Partner & Kuasa Hukum Pengadilan Pajak',
                'excerpt' => 'Jangan panik saat menerima SP2DK dari Account Representative (AR). Pelajari cara membedah data, membuat klarifikasi berdasar hukum, dan batas waktu respons.',
                'highlights' => [
                    'SP2DK bukan surat vonis denda, melainkan Surat Permintaan Penjelasan atas Data dan/atau Keterangan.',
                    'Wajib memberikan tanggapan resmi maksimal dalam waktu 14 hari kalender.',
                    'Selalu siapkan kertas kerja rekonsiliasi data sebelum berhadapan langsung dengan fiskus.',
                    'Didampingi oleh Kuasa Hukum Pengadilan Pajak resmi memastikan posisi hukum Anda terlindungi.',
                ],
                'content' => '
                    <p>Mendapatkan amplop berkop Direktorat Jenderal Pajak berisi <strong>Surat Permintaan Penjelasan atas Data dan/atau Keterangan (SP2DK)</strong> seringkali membuat pengusaha panik. Namun, kunci utama menghadapinya adalah kepala dingin, pemahaman data secara utuh, dan argumentasi yuridis yang kuat.</p>

                    <h2>1. Kenali Mengapa SP2DK Diterbitkan</h2>
                    <p>SP2DK diterbitkan ketika sistem pengawasan DJP menemukan indikasi ketidaksesuaian antara data internal (SPT yang Anda laporkan) dengan data eksternal pihak ketiga (seperti data perbankan, transaksi lawan transaksi, kepemilikan aset, atau data bea cukai).</p>

                    <h2>2. Perhatikan Batas Waktu 14 Hari Kalender</h2>
                    <p>Berdasarkan Surat Edaran Direktur Jenderal Pajak Nomor SE-05/PJ/2022, wajib pajak diberikan kesempatan memberikan penjelasan paling lama <strong>14 (empat belas) hari kalender</strong> sejak tanggal surat SP2DK disampaikan.</p>

                    <h2>3. Langkah Penyusunan Kertas Kerja Bantahan</h2>
                    <ul>
                        <li><strong>Identifikasi Butir Pertanyaan:</strong> Uraikan poin-poin yang diminta AR satu per satu secara runut.</li>
                        <li><strong>Rekonsiliasi Data Pembukuan:</strong> Tarik rekening koran dan ledger buku besar terkait pos yang disorot.</li>
                        <li><strong>Lampirkan Bukti Dokumen Pendukung:</strong> Faktur, kuitansi, kontrak kerja sama, atau bukti pemotongan PPh.</li>
                        <li><strong>Susun Surat Tanggapan Formal:</strong> Buat surat bernomor resmi dengan narasi objektif, santun, dan didasarkan pada pasal undang-undang perpajakan yang berlaku.</li>
                    </ul>

                    <div class="article-callout-box">
                        <h4>⚖️ Pentingnya Pendampingan Profesional:</h4>
                        <p>Salah satu kesalahan fatal adalah memberikan tanggapan lisan sembarangan tanpa didukung bukti formal. Sebagai Kuasa Hukum Resmi Pengadilan Pajak RI, tim Akuntan Indonesia .ID siap menganalisis substansi SP2DK Anda, menyusun draft tanggapan resmi, dan mendampingi audiensi hingga diterbitkan Laporan Hasil Permintaan Penjelasan (LHP2DK) yang tuntas tanpa sengketa lanjutan.</p>
                    </div>
                ',
                'tags' => ['SP2DK', 'Kuasa Hukum Pajak', 'Sengketa Pajak', 'Litigasi', 'Kepatuhan'],
                'is_published' => true,
                'views' => 840,
            ],
            [
                'slug' => 'mengapa-bisnis-butuh-laporan-keuangan-sak-emkm',
                'title' => 'Mengapa Bisnis Berkembang Wajib Memiliki Laporan Keuangan Standar SAK EMKM?',
                'category' => 'Standar Keuangan',
                'date_formatted' => '02 Agustus 2026',
                'read_time' => '4 menit baca',
                'author' => 'Tim Riset Akuntan Indonesia .ID',
                'author_role' => 'Senior Financial Advisory',
                'excerpt' => 'Laporan keuangan standar SAK bukan sekadar formalitas, melainkan syarat mutlak pengajuan pinjaman modal bank, kepatuhan SPT Badan, dan penarikan investor.',
                'highlights' => [
                    'SAK EMKM dirancang sederhana namun diakui resmi oleh perbankan dan otoritas perpajakan.',
                    'Memuat 3 laporan pokok: Posisi Keuangan, Laba Rugi, dan Catatan Atas Laporan Keuangan (CALK).',
                    'Meningkatkan kredibilitas kredit (bankability) hingga 3x lipat di mata analis perbankan.',
                    'Mempermudah proses audit internal dan transparansi dividen antarpemegang saham.',
                ],
                'content' => '
                    <p>Banyak pengusaha beranggapan bahwa standar akuntansi hanya diperuntukkan bagi perseroan raksasa yang melantai di bursa efek. Pandangan ini keliru. Ikatan Akuntan Indonesia (IAI) telah merilis <strong>Standar Akuntansi Keuangan Entitas Mikro, Kecil, dan Menengah (SAK EMKM)</strong> khusus untuk mengakomodasi fleksibilitas dunia usaha tanah air.</p>

                    <h2>3 Pilar Pokok Laporan Keuangan SAK EMKM</h2>
                    <p>Format SAK EMKM memangkas kerumitan akuntansi konvensional tanpa mengurangi esensi akuntabilitas, yang terdiri dari:</p>
                    <ul>
                        <li><strong>Laporan Posisi Keuangan (Neraca):</strong> Menggambarkan posisi aset lancar, aset tetap, kewajiban utang, dan ekuitas modal pemilik pada tanggal penutupan buku.</li>
                        <li><strong>Laporan Laba Rugi:</strong> Merangkum pendapatan operasional, harga pokok penjualan (HPP), biaya operasional, dan beban bunga serta pajak.</li>
                        <li><strong>Catatan Atas Laporan Keuangan (CALK):</strong> Penjelasan naratif mengenai kebijakan akuntansi yang diterapkan dan rincian akun-akun signifikan.</li>
                    </ul>

                    <h2>Dampak Nyata bagi Pertumbuhan Skala Bisnis (Scale-Up)</h2>
                    <p>Ketika bisnis Anda hendak mengajukan fasilitas pinjaman modal kerja ke perbankan atau menawarkan saham kepada <em>angel investor</em>, hal pertama yang diuji adalah keabsahan laporan keuangan. Laporan keuangan yang disusun oleh Kantor Jasa Akuntansi berlisensi resmi Kemenkeu RI memberikan jaminan kepercayaan tertinggi bagi lembaga pembiayaan.</p>
                ',
                'tags' => ['SAK EMKM', 'Laporan Keuangan', 'Kompilasi SAK', 'Bankability', 'Akuntansi'],
                'is_published' => true,
                'views' => 760,
            ],
            [
                'slug' => 'kapan-perusahaan-butuh-kuasa-hukum-pengadilan-pajak',
                'title' => 'Kapan Badan Usaha Membutuhkan Jasa Kuasa Hukum Resmi Pengadilan Pajak?',
                'category' => 'Litigasi & Solusi',
                'date_formatted' => '20 Juli 2026',
                'read_time' => '5 menit baca',
                'author' => 'Hendra Setiyawan, S.E., M.Ak., Ak., CA',
                'author_role' => 'Managing Partner & Kuasa Hukum Pengadilan Pajak',
                'excerpt' => 'Sengketa pajak akibat SKPKB atau penolakan keberatan membutuhkan pendampingan ahli berizin resmi. Ketahui tahapan banding dan gugatan di Pengadilan Pajak.',
                'highlights' => [
                    'Kuasa Hukum Pengadilan Pajak wajib memegang Izin Kuasa Hukum resmi dari Kementerian Keuangan RI.',
                    'Dibutuhkan saat proses Keberatan ditolak dan berlanjut ke tahap Banding atau Gugatan di Pengadilan Pajak Jakarta.',
                    'Dapat mewakili perusahaan secara langsung dalam persidangan majelis hakim Pengadilan Pajak.',
                    'Mitigasi risiko denda sanksi bunga hingga 60% jika banding ditolak.',
                ],
                'content' => '
                    <p>Dalam dinamika kepatuhan perpajakan perusahaan, perbedaan penafsiran hukum antara wajib pajak dan petugas pemeriksa pajak adalah hal yang kerap terjadi. Ketika proses pemeriksaan menghasilkan <strong>Surat Ketetapan Pajak Kurang Bayar (SKPKB)</strong> dengan nilai nominal yang fantastis, perusahaan memiliki hak konstitusional untuk mencari keadilan hukum.</p>

                    <h2>Perjalanan Sengketa: Dari KPP hingga Meja Hijau</h2>
                    <p>Prosedur formal penyelesaian sengketa perpajakan terbagi ke dalam beberapa etape berjenjang:</p>
                    <ul>
                        <li><strong>Tahap Keberatan:</strong> Diajukan ke Kantor Wilayah DJP dalam waktu 3 bulan sejak SKPKB diterbitkan.</li>
                        <li><strong>Tahap Banding:</strong> Jika Surat Keputusan Keberatan menolak permohonan Anda, upaya hukum banding dapat diajukan ke Pengadilan Pajak dalam kurun waktu 3 bulan.</li>
                        <li><strong>Tahap Gugatan:</strong> Upaya hukum terhadap pelaksanaan penagihan pajak atau keputusan tata usaha perpajakan lainnya diajukan dalam waktu 14 s.d. 30 hari.</li>
                    </ul>

                    <h2>Kualifikasi Kuasa Hukum yang Sah di Mata Hukum</h2>
                    <p>Perlu diketahui bahwa tidak semua konsultan pajak atau akuntan dapat beracara di ruang sidang Pengadilan Pajak. Berdasarkan Undang-Undang Nomor 14 Tahun 2002 tentang Pengadilan Pajak, pendamping sidang wajib memiliki <strong>Surat Keputusan Izin Kuasa Hukum dari Ketua Pengadilan Pajak</strong>.</p>

                    <div class="article-callout-box">
                        <h4>🛡️ Komitmen Kami dalam Pembelaan Hak Wajib Pajak:</h4>
                        <p>Managing Partner Akuntan Indonesia .ID berstatus resmi sebagai Kuasa Hukum Pengadilan Pajak Republik Indonesia yang siap merancang strategi pembelaan, menyusun memori banding, memeriksa bukti kontra, dan mendampingi proses persidangan secara terukur dan penuh dedikasi.</p>
                    </div>
                ',
                'tags' => ['Pengadilan Pajak', 'Kuasa Hukum Pajak', 'Banding Pajak', 'Keberatan Pajak', 'Litigasi'],
                'is_published' => true,
                'views' => 650,
            ],
        ];

        foreach ($articles as $art) {
            Article::updateOrCreate(['slug' => $art['slug']], $art);
        }

        // 3. Packages / Services
        $packages = [
            [
                'title' => 'Paket UMKM & Freelancer',
                'slug' => 'umkm-freelancer',
                'badge' => 'Paling Hemat untuk Pemula',
                'subtitle' => 'Cocok untuk pedagang online, UMKM perorangan, content creator, dan konsultan independen.',
                'price_note' => 'Mulai Rp 750 Ribu / bulan',
                'features' => [
                    'Pencatatan s.d. 100 transaksi / bulan',
                    'Laporan Laba Rugi & Arus Kas sederhana',
                    'Konsultasi PPh Final UMKM 0.5% (PP 55/2022)',
                    'Bebas Pajak Omzet s.d. Rp 500 Juta',
                    'Konsultasi via WhatsApp Group khusus',
                ],
                'is_featured' => false,
                'sort_order' => 1,
            ],
            [
                'title' => 'Paket Scale-Up Bisnis',
                'slug' => 'scale-up',
                'badge' => 'Paling Diminati (Best Value)',
                'subtitle' => 'Dirancang untuk CV / PT berkembang dengan transaksi aktif yang membutuhkan kepatuhan pajak & laporan komprehensif.',
                'price_note' => 'Mulai Rp 2.5 Juta / bulan',
                'features' => [
                    'Pencatatan s.d. 500 transaksi / bulan',
                    'Laporan Keuangan Standar SAK EMKM / EP',
                    'Kompilasi SPT Masa PPh 21, 23, dan PPN',
                    'Tax Planning & Review Kepatuhan Bulanan',
                    'Pendampingan respons SP2DK dari DJP',
                    'Review berkala via Zoom / Tatap Muka Batam',
                ],
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Paket Corporate & Litigasi',
                'slug' => 'corporate',
                'badge' => 'Solusi Korporat & Sengketa',
                'subtitle' => 'Layanan tingkat eksekutif untuk perseroan, grup usaha, restrukturisasi, AUP, atau litigasi Pengadilan Pajak.',
                'price_note' => 'Custom Sesuai Kebutuhan',
                'features' => [
                    'Full Outsourcing Keuangan & Akuntansi',
                    'Penyusunan Tata Kelola Perusahaan (GCG)',
                    'Pendampingan Kuasa Hukum Pengadilan Pajak RI',
                    'Penyusunan Dokumen Transfer Pricing (TP Doc)',
                    'Agreed-Upon Procedures (AUP) khusus',
                    'Dedicated Senior Partner Advisory',
                ],
                'is_featured' => false,
                'sort_order' => 3,
            ],
        ];

        foreach ($packages as $pkg) {
            Service::updateOrCreate(['slug' => $pkg['slug']], $pkg);
        }

        // 4. FAQs
        $faqs = [
            [
                'question' => 'Apakah Akuntan Indonesia .ID memiliki izin resmi dari Kementerian Keuangan?',
                'answer' => 'Ya, kami adalah Kantor Jasa Akuntansi berizin resmi di bawah pembinaan Kementerian Keuangan RI dan asosiasi profesi Ikatan Akuntan Indonesia (IAI). Selain itu, Managing Partner kami berstatus resmi sebagai Kuasa Hukum Pengadilan Pajak Republik Indonesia.',
                'category' => 'Legalitas',
                'sort_order' => 1,
            ],
            [
                'question' => 'Bisnis saya berada di luar Batam, apakah bisa menggunakan jasa Akuntan.ID?',
                'answer' => 'Tentu saja. Kami melayani klien di seluruh Indonesia secara remote dan digital menggunakan software akuntansi cloud, pertukaran data terenkripsi, dan konsultasi tatap maya via Zoom/Google Meet & WhatsApp.',
                'category' => 'Jangkauan',
                'sort_order' => 2,
            ],
            [
                'question' => 'Bagaimana jika bisnis saya mendapatkan surat SP2DK atau teguran dari Kantor Pajak?',
                'answer' => 'Tenang, jangan panik. Tim kami akan membedah latar belakang data yang dipertanyakan oleh DJP, menyusun rekonsiliasi data pendukung, membuatkan draft tanggapan resmi yang berdasar hukum, dan mendampingi Anda berkomunikasi dengan Account Representative (AR) hingga tuntas.',
                'category' => 'Perpajakan',
                'sort_order' => 3,
            ],
            [
                'question' => 'Berapa lama proses pembuatan laporan keuangan bulanan?',
                'answer' => 'Tergantung kelengkapan dokumen transaksi yang diserahkan. Biasanya laporan keuangan bulanan selesai dalam 3 hingga 5 hari kerja setelah data rekening koran dan bukti transaksi diterima secara lengkap.',
                'category' => 'Layanan',
                'sort_order' => 4,
            ],
            [
                'question' => 'Bagaimana kerahasiaan data keuangan dan pembukuan bisnis saya dijaga?',
                'answer' => 'Kami terikat oleh Kode Etik Profesi Akuntan mengenai kerahasiaan data (confidentiality). Seluruh data transaksi klien disimpan dalam server terenkripsi dan kami siap menandatangani Non-Disclosure Agreement (NDA) sebelum penugasan dimulai.',
                'category' => 'Keamanan',
                'sort_order' => 5,
            ],
        ];

        foreach ($faqs as $f) {
            Faq::updateOrCreate(['question' => $f['question']], $f);
        }

        // 5. Testimonials
        $testimonials = [
            [
                'client_name' => 'Budi Pratama',
                'company' => 'PT Digital Niaga Batam (E-Commerce)',
                'role' => 'Owner',
                'rating' => 5,
                'review' => 'Dulu tiap akhir tahun selalu stres urus SPT Badan dan faktur PPN. Sejak bekerja sama dengan Akuntan.ID, semua pembukuan tersusun rapi tiap tanggal 5, laporan pajak selalu tepat waktu, dan cash flow bisnis jadi transparan.',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'client_name' => 'Dr. Jessica Wijaya',
                'company' => 'Klinik Estetika Harmoni',
                'role' => 'Founder',
                'rating' => 5,
                'review' => 'Penjelasan Pak Hendra dan tim sangat edukatif dan mudah dimengerti, tidak kaku seperti konsultan konvensional. Saat kami menerima SP2DK, tim langsung sigap membuatkan analisis data bantahan hingga tuntas tanpa denda.',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'client_name' => 'Reza Fahlevi',
                'company' => 'Freelancer Global',
                'role' => 'Fullstack Developer',
                'rating' => 5,
                'review' => 'Sebagai freelancer dengan klien luar negeri, saya bingung sekali cara hitung pajak dan norma NPPN. Akuntan Indonesia .ID membantu memetakan semuanya sampai tuntas dengan biaya yang sangat masuk akal.',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['client_name' => $t['client_name']], $t);
        }
    }
}
