<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Consultation;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = $this->getProfileData();

        $vision = 'Menjadi Kantor Jasa Akuntan terdepan yang berintegritas dan profesional dalam menyajikan solusi keuangan komprehensif yang adaptif dengan peraturan terbaru, menjadi mitra strategis dalam menjaga transparansi dan integritas keuangan nasional, serta menjadi pusat pengembangan talenta akuntan muda Indonesia.';

        $missionPillars = [
            [
                'id' => 'm1',
                'title' => 'Financial Solved, No Stress',
                'badge' => 'Pilar 01',
                'desc' => 'Memberikan layanan akuntansi dan perpajakan end-to-end yang sat-set, patuh aturan, dan bikin bisnis klien jalan tanpa pusing.',
                'color' => 'ruby',
                'icon' => '🛡️',
                'mascot_img' => asset('images/mascot-solusi.jpg'),
                'mascot_label' => 'Memberi Solusi',
            ],
            [
                'id' => 'm2',
                'title' => 'Work Smarter & Efficient',
                'badge' => 'Pilar 02',
                'desc' => 'Memangkas proses rumit lewat solusi digital yang efektif dan efisien biar klien bisa fokus scaling up bisnis mereka.',
                'color' => 'indigo',
                'icon' => '⚡',
                'mascot_img' => asset('images/mascot-profesional.jpg'),
                'mascot_label' => 'Profesional & Cepat',
            ],
            [
                'id' => 'm3',
                'title' => 'Level Up Akuntan Muda',
                'badge' => 'Pilar 03',
                'desc' => 'Buka ruang mentorship yang seru dan inklusif buat mencetak akuntan muda Indonesia yang makin kompeten, cerdas, dan siap bersaing.',
                'color' => 'emerald',
                'icon' => '🌱',
                'mascot_img' => asset('images/mascot-tumbuh.jpg'),
                'mascot_label' => 'Semangat Bertumbuh',
            ],
            [
                'id' => 'm4',
                'title' => 'Impact Buat Negara',
                'badge' => 'Pilar 04',
                'desc' => 'Mendorong keterbukaan laporan keuangan dan kepatuhan pajak sebagai wujud kontribusi nyata membangun ekonomi Indonesia yang lebih sehat.',
                'color' => 'gold',
                'icon' => '🇮🇩',
                'mascot_img' => asset('images/mascot-pajak.jpg'),
                'mascot_label' => 'Patuh Regulasi',
            ],
        ];

        $coreValues = [
            [
                'title' => 'High Standard & Agile',
                'tag' => 'Presisi & Cepat',
                'desc' => 'Kerja serba cepat, presisi tinggi, dan selalu up-to-date dengan regulasi perpajakan nasional terkini (termasuk Coretax DJP).',
                'icon' => '⚡',
                'color' => 'ruby',
            ],
            [
                'title' => 'Radical Transparency',
                'tag' => 'Kejujuran & Etika',
                'desc' => 'Jujur, memegang teguh etika profesi akuntan IAI, dan menjaga kerahasiaan data serta kepercayaan penuh klien & negara.',
                'icon' => '🔍',
                'color' => 'indigo',
            ],
            [
                'title' => 'Efficiency First (Anti-Ribet)',
                'tag' => 'Hemat Waktu',
                'desc' => 'Anti-ribet. Semua masalah keuangan diselesaikan lewat cara cerdas, alur digital terstruktur, dan hemat waktu.',
                'icon' => '⏱️',
                'color' => 'gold',
            ],
            [
                'title' => 'Growth Mindset',
                'tag' => 'Tumbuh Bersama',
                'desc' => 'Terus belajar, saling membimbing, dan memfasilitasi talenta serta bisnis klien untuk berkembang maksimal.',
                'icon' => '📈',
                'color' => 'emerald',
            ],
        ];

        // 10 JASA LENGKAP DARI DOKUMEN RESMI AKUNTAN INDONESIA .ID
        $services = [
            [
                'id' => 'pembukuan',
                'category' => 'pembukuan',
                'category_label' => 'Pembukuan & Laporan',
                'title' => 'Pembukuan (Bookkeeping)',
                'badge' => 'Pondasi Bisnis Rapi',
                'color' => 'ruby',
                'icon' => '📊',
                'desc' => 'Solusi bikin catatan keuangan kamu rapi tanpa drama. Kita bantu catat semua transaksi harian, dari pemasukan sampai pengeluaran, biar kamu tahu persis kemana perginya cash flow bisnis.',
                'points' => [
                    'Pencatatan transaksi harian & rekonsiliasi mutasi bank',
                    'Tracking arus kas (cash flow) masuk & keluar real-time',
                    'Pemisahan rekening pribadi dan operasional bisnis',
                    'Pengarsipan bukti transaksi digital terstruktur',
                ],
                'mascot_tip' => 'Catatan rapi bikin bisnis bebas bocor!',
            ],
            [
                'id' => 'kompilasi-laporan',
                'category' => 'pembukuan',
                'category_label' => 'Pembukuan & Laporan',
                'title' => 'Kompilasi Laporan Keuangan',
                'badge' => 'Standar SAK EMKM / EP',
                'color' => 'indigo',
                'icon' => '📑',
                'desc' => 'Bukan cuma sekadar ngumpulin angka, kita rapikan dan olah data transaksi kamu jadi Laporan Keuangan yang sesuai standar akuntansi (SAK). Hasilnya? Laporan rapi, transparan, dan siap dipakai buat presentasi ke investor atau pihak bank.',
                'points' => [
                    'Penyusunan Laporan Laba Rugi komprehensif',
                    'Laporan Posisi Keuangan (Neraca) & Ekuitas',
                    'Laporan Arus Kas (Cash Flow Statement)',
                    'Catatan atas Laporan Keuangan (CALK) standar perbankan',
                ],
                'mascot_tip' => 'Laporan siap pitching ke investor & bank!',
            ],
            [
                'id' => 'manajemen-operasional',
                'category' => 'manajemen',
                'category_label' => 'Manajemen & GCG',
                'title' => 'Manajemen Operasional & Alur Kerja',
                'badge' => 'Efisiensi Kerja',
                'color' => 'gold',
                'icon' => '⚙️',
                'desc' => 'Pendampingan penuh buat kelola operasional dan sumber daya bisnis kamu. Kita bantu susun alur kerja yang efisien biar bisnis bisa jalan optimal tanpa bikin kamu burnout.',
                'points' => [
                    'Perancangan alur kerja (workflow) operasional keuangan',
                    'Standard Operating Procedure (SOP) divisi finance & kasir',
                    'Optimasi utilisasi sumber daya dan perputaran modal',
                    'Manajemen kontrol stok dan persediaan barang',
                ],
                'mascot_tip' => 'Bisnis autopilot tanpa bikin owner burnout.',
            ],
            [
                'id' => 'akuntansi-manajemen',
                'category' => 'manajemen',
                'category_label' => 'Manajemen & GCG',
                'title' => 'Akuntansi Manajemen',
                'badge' => 'Data-Driven Decision',
                'color' => 'emerald',
                'icon' => '📈',
                'desc' => 'Data keuangan internal disajikan khusus buat bahan diskusi tim eksekutif. Isinya berupa analisis biaya dan angka-angka krusial yang bikin kamu bisa ambil keputusan bisnis secara data-driven, bukan cuma tebak-tebakan.',
                'points' => [
                    'Analisis margin laba per lini produk & layanan',
                    'Analisis Titik Impas / Break-Even Point (BEP)',
                    'Cost Accounting & evaluasi efisiensi biaya operasional',
                    'Executive Financial Dashboard bulanan',
                ],
                'mascot_tip' => 'Keputusan bisnis tepat berbasis data riil.',
            ],
            [
                'id' => 'konsultasi-manajemen',
                'category' => 'manajemen',
                'category_label' => 'Manajemen & GCG',
                'title' => 'Konsultasi Manajemen & Scaling Up',
                'badge' => 'Mitra Strategis',
                'color' => 'cyan',
                'icon' => '💡',
                'desc' => 'Brainstorming bareng ahli buat bedah masalah operasional maupun keuangan. Kita kasih strategi dan solusi konkret biar bisnis kamu punya ekosistem yang makin sehat dan siap scaling up.',
                'points' => [
                    'Bedah bottleneck finansial & arus kas bisnis',
                    'Perencanaan Budgeting & Forecasting jangka menengah',
                    'Strategi ekspansi & pricing strategy produk',
                    'Sesi mentoring berkala bersama Senior Partner',
                ],
                'mascot_tip' => 'Teman diskusi strategis untuk scale up!',
            ],
            [
                'id' => 'perpajakan-litigasi',
                'category' => 'pajak',
                'category_label' => 'Pajak & Litigasi',
                'title' => 'Perpajakan & Kuasa Hukum Pengadilan Pajak',
                'badge' => 'Litigasi Resmi Kemenkeu',
                'color' => 'ruby',
                'icon' => '⚖️',
                'desc' => 'Bikin kamu tenang dan bebas dari rasa cemas urusan pajak. Tim kita siap mendampingi end-to-end: mulai dari perhitungan rutin, pelaporan SPT, perencanaan pajak (tax planning) yang efisien, hingga pengawasan kepatuhan pajak bisnis kamu. Nggak cuma itu, kalau bisnis kamu menghadapi pemeriksaan, sengketa, atau butuh banding, tim kita juga dilengkapi Kuasa Hukum Pengadilan Pajak resmi yang siap mendampingi dan memperjuangkan hak-hak perpajakan kamu hingga tuntas di Pengadilan Pajak.',
                'points' => [
                    'Perhitungan & pelaporan SPT Masa (PPh 21, 23, PPN) & Tahunan Badan/OP',
                    'Optimalisasi Tax Planning legal sesuai aturan UU HPP & Coretax',
                    'Pendampingan tanggapan SP2DK & Berita Acara Pemeriksaan DJP',
                    'Kuasa Hukum Resmi Keberatan, Banding, & Gugatan Pengadilan Pajak RI',
                ],
                'mascot_tip' => 'Didampingi Kuasa Hukum resmi hingga tuntas!',
            ],
            [
                'id' => 'aup',
                'category' => 'pembukuan',
                'category_label' => 'Pembukuan & Laporan',
                'title' => 'Agreed-Upon Procedures (AUP)',
                'badge' => 'Investigasi Khusus',
                'color' => 'violet',
                'icon' => '🔍',
                'desc' => 'Penugasan investigasi atau evaluasi spesifik sesuai request kamu. Misalnya mau periksa pos keuangan tertentu atau verifikasi data khusus, kita siap eksekusi sesuai prosedur yang disepakati bersama.',
                'points' => [
                    'Investigasi saldo kas, piutang, dan persediaan tertentu',
                    'Verifikasi transaksi khusus antar entitas / pemegang saham',
                    'Due diligence keuangan untuk kemitraan atau akuisisi',
                    'Laporan temuan faktual (Factual Findings Report)',
                ],
                'mascot_tip' => 'Bedah pos keuangan tertentu sesuai kebutuhan.',
            ],
            [
                'id' => 'pendampingan-laporan',
                'category' => 'pembukuan',
                'category_label' => 'Pembukuan & Laporan',
                'title' => 'Pendampingan Laporan Keuangan',
                'badge' => 'Mentoring Staf Internal',
                'color' => 'emerald',
                'icon' => '🤝',
                'desc' => 'Ngga perlu bingung kalau tim internal kamu masih canggung bikin laporan keuangan. Kita dampingi step-by-step dan kasih pengawasan teknis biar laporan yang dihasilkan akurat dan valid.',
                'points' => [
                    'Supervisi teknis bulanan staf accounting internal',
                    'Review jurnal penyesuaian & closing akhir bulan/tahun',
                    'Quality assurance kepatuhan standar akuntansi SAK',
                    'Transfer knowledge dan peningkatan skill tim keuangan',
                ],
                'mascot_tip' => 'Bimbing tim internal sampai mahir & mandiri.',
            ],
            [
                'id' => 'laporan-gcg',
                'category' => 'manajemen',
                'category_label' => 'Manajemen & GCG',
                'title' => 'Penyusunan Laporan Tata Kelola (GCG)',
                'badge' => 'Transparansi & Reputasi',
                'color' => 'indigo',
                'icon' => '🏛️',
                'desc' => 'Bantu bisnis kamu punya sistem kerja yang transparan dan akuntabel. Kita susun kerangka Good Corporate Governance biar reputasi bisnis kamu makin tepercaya di mata klien maupun investor.',
                'points' => [
                    'Penyusunan kerangka Good Corporate Governance (GCG)',
                    'Evaluasi sistem pengendalian internal (Internal Control System)',
                    'Pencegahan fraud dan kebocoran dana operasional',
                    'Dokumen kepatuhan tata kelola untuk reputasi korporasi',
                ],
                'mascot_tip' => 'Reputasi bisnis kokoh di mata mitra & investor.',
            ],
            [
                'id' => 'sistem-informasi',
                'category' => 'sistem',
                'category_label' => 'Sistem Cloud',
                'title' => 'Sistem Informasi Akuntansi & Cloud',
                'badge' => 'Efisiensi Digital Modern',
                'color' => 'cyan',
                'icon' => '💻',
                'desc' => 'Saatnya tinggalin pencatatan manual yang bikin pusing. Kita bantu rancang dan integrasikan sistem informasi akuntansi berbasis teknologi yang pas dengan kebutuhan operasional bisnis kamu.',
                'points' => [
                    'Setup software akuntansi cloud (Jurnal, Accurate, Zahir, Odoo)',
                    'Integrasi POS kasir, e-commerce, dan sistem invoicing',
                    'Automasi pembuatan faktur dan monitoring piutang',
                    'Training dan migrasi database pembukuan aman',
                ],
                'mascot_tip' => 'Tinggalkan spreadsheet manual yang rentan salah!',
            ],
        ];

        $packages = [
            [
                'name' => 'Paket UMKM & Freelancer',
                'slug' => 'umkm',
                'price' => 'Mulai Rp 750 Ribu',
                'period' => '/ bulan',
                'badge' => 'Favorit Usaha Rintisan',
                'desc' => 'Cocok untuk freelancer, toko online, dan pelaku UMKM yang butuh pembukuan rapi dan SPT terurus tanpa pusing.',
                'is_popular' => false,
                'color' => 'emerald',
                'features' => [
                    'Pencatatan s.d. 150 transaksi / bulan',
                    'Laporan Laba Rugi & Arus Kas sederhana',
                    'Perhitungan & Setor PPh Final 0.5% (UU HPP)',
                    'Konsultasi via WhatsApp di jam kerja',
                    'Gratis Pendampingan SPT Tahunan OP',
                ],
                'cta_text' => 'Pilih Paket UMKM',
                'cta_wa' => 'Halo Akuntan.ID, saya tertarik dengan Paket UMKM & Freelancer.',
            ],
            [
                'name' => 'Paket Scale-Up Bisnis',
                'slug' => 'scale-up',
                'price' => 'Mulai Rp 2.5 Juta',
                'period' => '/ bulan',
                'badge' => 'Paling Diminati (Best Value)',
                'desc' => 'Dirancang untuk CV / PT berkembang dengan transaksi aktif yang membutuhkan kepatuhan pajak & laporan komprehensif.',
                'is_popular' => true,
                'color' => 'ruby',
                'features' => [
                    'Pencatatan s.d. 500 transaksi / bulan',
                    'Laporan Keuangan Standar SAK EMKM / EP',
                    'Kompilasi SPT Masa PPh 21, 23, dan PPN',
                    'Tax Planning & Review Kepatuhan Bulanan',
                    'Pendampingan respons SP2DK dari DJP',
                    'Review berkala via Zoom / Tatap Muka Batam',
                ],
                'cta_text' => 'Konsultasi Scale-Up Bisnis',
                'cta_wa' => 'Halo Akuntan.ID, saya ingin konsultasi Paket Scale-Up Bisnis.',
            ],
            [
                'name' => 'Paket Corporate & Litigasi',
                'slug' => 'corporate',
                'price' => 'Custom Sesuai Kebutuhan',
                'period' => '/ proyek atau retainer',
                'badge' => 'Solusi Korporat & Sengketa',
                'desc' => 'Layanan tingkat eksekutif untuk perseroan, grup usaha, restrukturisasi, AUP, atau litigasi Pengadilan Pajak.',
                'is_popular' => false,
                'color' => 'indigo',
                'features' => [
                    'Full Outsourcing Keuangan & Akuntansi',
                    'Penyusunan Tata Kelola Perusahaan (GCG)',
                    'Pendampingan Kuasa Hukum Pengadilan Pajak RI',
                    'Penyusunan Dokumen Transfer Pricing (TP Doc)',
                    'Agreed-Upon Procedures (AUP) khusus',
                    'Dedicated Senior Partner Advisory',
                ],
                'cta_text' => 'Diskusikan Kebutuhan Korporat',
                'cta_wa' => 'Halo Akuntan.ID, saya mewakili perusahaan ingin berdiskusi mengenai Paket Corporate & Litigasi.',
            ],
        ];

        $comparisons = [
            [
                'aspect' => 'Kecepatan Respons & Konsultasi',
                'our' => 'Cepat via WhatsApp, responsif, proaktif memberi arahan sat-set',
                'conventional' => 'Lambat, harus janji temu formal, respons via surat/email berhari-hari',
                'self' => 'Sering bingung cari jawaban di forum tanpa kepastian hukum',
            ],
            [
                'aspect' => 'Keahlian & Izin Praktik Resmi',
                'our' => 'Akuntan Beregister Kemenkeu RI + Kuasa Hukum Resmi Pengadilan Pajak',
                'conventional' => 'Bervariasi, seringkali diserahkan ke staf junior yang minim lisensi',
                'self' => 'Tidak tersertifikasi, rentan salah tafsir regulasi perpajakan',
            ],
            [
                'aspect' => 'Transparansi Tarif & Biaya',
                'our' => 'Jelas, transparan di awal, terukur tanpa biaya siluman',
                'conventional' => 'Seringkali ada biaya tersembunyi per revisi / per lembar laporan',
                'self' => 'Tampak gratis di awal, namun berisiko denda jutaan rupiah',
            ],
            [
                'aspect' => 'Kesiapan Sistem Digital & Coretax',
                'our' => '100% Cloud-friendly, siap penuh sistem Coretax DJP & integrasi software',
                'conventional' => 'Masih bergantung dokumen kertas dan pertemuan fisik kaku',
                'self' => 'Kesulitan adaptasi sistem elektronik DJP yang terus berganti',
            ],
            [
                'aspect' => 'Pendampingan Sengketa & SP2DK',
                'our' => 'Didampingi langsung hingga tuntas di Pengadilan Pajak RI',
                'conventional' => 'Hanya membuatkan laporan, lepas tangan saat terjadi sengketa',
                'self' => 'Panik dan berisiko salah langkah hukum saat dipanggil DJP',
            ],
        ];

        $audiences = [
            [
                'title' => 'UMKM & Toko Retail / Online',
                'icon' => '🛍️',
                'desc' => 'Pemilik usaha kuliner, fashion, distributor, atau e-commerce yang ingin catatan modal & laba jelas, serta tertib bayar pajak PPh Final 0.5% tanpa pusing.',
                'tags' => ['Omzet < 4.8M', 'Pajak Final 0.5%', 'Laporan Kas & Stok', 'Bebas SP2DK'],
            ],
            [
                'title' => 'Freelancer & Digital Creator',
                'icon' => '💻',
                'desc' => 'Developer, designer, agency owner, affiliate marketer, dan content creator dengan penghasilan dalam maupun luar negeri yang ingin SPT rapi.',
                'tags' => ['Norma NPPN', 'Income Luar Negeri', 'SPT Tahunan OP', 'Konsultasi Coretax'],
            ],
            [
                'title' => 'Startup & Perusahaan Scale-Up',
                'icon' => '🚀',
                'desc' => 'Bisnis berkembang yang membutuhkan laporan keuangan formal standar SAK untuk pitching investor, pencairan kredit bank, atau audit internal.',
                'tags' => ['Standar SAK EMKM/EP', 'Pitch Deck Ready', 'Struktur Biaya', 'Internal Control'],
            ],
            [
                'title' => 'Badan Usaha PT, CV & PMA',
                'icon' => '🏛️',
                'desc' => 'Perseroan dan entitas bisnis yang memerlukan mitra outsourcing akuntansi profesional, kepatuhan PPN/PPh badan bulanan, dan litigasi pajak.',
                'tags' => ['Outsourcing Full', 'SPT Badan 1771', 'Faktur PPN', 'Pengadilan Pajak'],
            ],
        ];

        try {
            $dbPackages = Service::orderBy('sort_order', 'asc')->get();
            if ($dbPackages->isNotEmpty()) {
                $packages = $dbPackages->map(function ($p) {
                    return [
                        'name' => $p->title,
                        'slug' => $p->slug,
                        'price' => $p->price_note ?: 'Mulai Negosiasi',
                        'period' => '/ bulan',
                        'badge' => $p->badge,
                        'desc' => $p->subtitle,
                        'is_popular' => (bool) $p->is_featured,
                        'color' => $p->is_featured ? 'ruby' : 'indigo',
                        'features' => $p->features ?: [],
                        'cta_text' => 'Pilih '.$p->title,
                        'cta_wa' => 'Halo Akuntan.ID, saya tertarik dengan '.$p->title.'.',
                    ];
                })->toArray();
            }
        } catch (\Throwable $e) {
            // fallback if table does not exist
        }

        $articles = $this->getArticlesList();

        try {
            $dbFaqs = Faq::orderBy('sort_order', 'asc')->get();
            if ($dbFaqs->isNotEmpty()) {
                $faqs = $dbFaqs->map(function ($f) {
                    return [
                        'q' => $f->question,
                        'a' => $f->answer,
                    ];
                })->toArray();
            } else {
                $faqs = [
                    [
                        'q' => 'Apakah Akuntan Indonesia .ID memiliki izin resmi dari Kementerian Keuangan?',
                        'a' => 'Ya, kami adalah Kantor Jasa Akuntansi berizin resmi di bawah pembinaan Kementerian Keuangan RI dan asosiasi profesi Ikatan Akuntan Indonesia (IAI). Selain itu, Managing Partner kami berstatus resmi sebagai Kuasa Hukum Pengadilan Pajak Republik Indonesia.',
                    ],
                    [
                        'q' => 'Bisnis saya berada di luar Batam, apakah bisa menggunakan jasa Akuntan.ID?',
                        'a' => 'Tentu saja. Kami melayani klien di seluruh Indonesia secara remote dan digital menggunakan software akuntansi cloud, pertukaran data terenkripsi, dan konsultasi tatap maya via Zoom/Google Meet & WhatsApp.',
                    ],
                    [
                        'q' => 'Bagaimana jika bisnis saya mendapatkan surat SP2DK atau teguran dari Kantor Pajak?',
                        'a' => 'Tenang, jangan panik. Tim kami akan membedah latar belakang data yang dipertanyakan oleh DJP, menyusun rekonsiliasi data pendukung, membuatkan draft tanggapan resmi yang berdasar hukum, dan mendampingi Anda berkomunikasi dengan Account Representative (AR) hingga tuntas.',
                    ],
                    [
                        'q' => 'Berapa lama proses pembuatan laporan keuangan bulanan?',
                        'a' => 'Tergantung kelengkapan dokumen transaksi yang diserahkan. Biasanya laporan keuangan bulanan selesai dalam 3 hingga 5 hari kerja setelah data rekening koran dan bukti transaksi diterima secara lengkap.',
                    ],
                    [
                        'q' => 'Bagaimana kerahasiaan data keuangan dan pembukuan bisnis saya dijaga?',
                        'a' => 'Kami terikat oleh Kode Etik Profesi Akuntan mengenai kerahasiaan data (confidentiality). Seluruh data transaksi klien disimpan dalam server terenkripsi dan kami siap menandatangani Non-Disclosure Agreement (NDA) sebelum penugasan dimulai.',
                    ],
                ];
            }
        } catch (\Throwable $e) {
            $faqs = [
                [
                    'q' => 'Apakah Akuntan Indonesia .ID memiliki izin resmi dari Kementerian Keuangan?',
                    'a' => 'Ya, kami adalah Kantor Jasa Akuntansi berizin resmi di bawah pembinaan Kementerian Keuangan RI dan asosiasi profesi Ikatan Akuntan Indonesia (IAI). Selain itu, Managing Partner kami berstatus resmi sebagai Kuasa Hukum Pengadilan Pajak Republik Indonesia.',
                ],
                [
                    'q' => 'Bisnis saya berada di luar Batam, apakah bisa menggunakan jasa Akuntan.ID?',
                    'a' => 'Tentu saja. Kami melayani klien di seluruh Indonesia secara remote dan digital menggunakan software akuntansi cloud, pertukaran data terenkripsi, dan konsultasi tatap maya via Zoom/Google Meet & WhatsApp.',
                ],
                [
                    'q' => 'Bagaimana jika bisnis saya mendapatkan surat SP2DK atau teguran dari Kantor Pajak?',
                    'a' => 'Tenang, jangan panik. Tim kami akan membedah latar belakang data yang dipertanyakan oleh DJP, menyusun rekonsiliasi data pendukung, membuatkan draft tanggapan resmi yang berdasar hukum, dan mendampingi Anda berkomunikasi dengan Account Representative (AR) hingga tuntas.',
                ],
                [
                    'q' => 'Berapa lama proses pembuatan laporan keuangan bulanan?',
                    'a' => 'Tergantung kelengkapan dokumen transaksi yang diserahkan. Biasanya laporan keuangan bulanan selesai dalam 3 hingga 5 hari kerja setelah data rekening koran dan bukti transaksi diterima secara lengkap.',
                ],
                [
                    'q' => 'Bagaimana kerahasiaan data keuangan dan pembukuan bisnis saya dijaga?',
                    'a' => 'Kami terikat oleh Kode Etik Profesi Akuntan mengenai kerahasiaan data (confidentiality). Seluruh data transaksi klien disimpan dalam server terenkripsi dan kami siap menandatangani Non-Disclosure Agreement (NDA) sebelum penugasan dimulai.',
                ],
            ];
        }

        try {
            $dbTestimonials = Testimonial::where('is_active', true)->orderBy('sort_order', 'asc')->get();
            if ($dbTestimonials->isNotEmpty()) {
                $testimonials = $dbTestimonials->map(function ($t) {
                    return [
                        'name' => $t->client_name,
                        'role' => $t->company ? "{$t->role} - {$t->company}" : ($t->role ?: 'Klien'),
                        'service' => 'Layanan Terpadu',
                        'stars' => $t->rating ?: 5,
                        'quote' => $t->review,
                    ];
                })->toArray();
            } else {
                $testimonials = [
                    [
                        'name' => 'Budi Pratama',
                        'role' => 'Owner PT Digital Niaga Batam (E-Commerce)',
                        'service' => 'Paket Scale-Up Bisnis',
                        'stars' => 5,
                        'quote' => 'Dulu tiap akhir tahun selalu stres urus SPT Badan dan faktur PPN. Sejak bekerja sama dengan Akuntan.ID, semua pembukuan tersusun rapi tiap tanggal 5, laporan pajak selalu tepat waktu, dan cash flow bisnis jadi transparan.',
                    ],
                    [
                        'name' => 'Dr. Jessica Wijaya',
                        'role' => 'Founder Klinik Estetika Harmoni',
                        'service' => 'Manajemen Pajak & SPT',
                        'stars' => 5,
                        'quote' => 'Penjelasan Pak Hendra dan tim sangat edukatif dan mudah dimengerti, tidak kaku seperti konsultan konvensional. Saat kami menerima SP2DK, tim langsung sigap membuatkan analisis data bantahan hingga tuntas tanpa denda.',
                    ],
                    [
                        'name' => 'Reza Fahlevi',
                        'role' => 'Fullstack Developer & Remote Worker Internasional',
                        'service' => 'Paket UMKM & Freelancer',
                        'stars' => 5,
                        'quote' => 'Sebagai freelancer dengan klien luar negeri, saya bingung sekali cara hitung pajak dan norma NPPN. Akuntan Indonesia .ID membantu memetakan semuanya sampai tuntas dengan biaya yang sangat masuk akal.',
                    ],
                ];
            }
        } catch (\Throwable $e) {
            $testimonials = [
                [
                    'name' => 'Budi Pratama',
                    'role' => 'Owner PT Digital Niaga Batam (E-Commerce)',
                    'service' => 'Paket Scale-Up Bisnis',
                    'stars' => 5,
                    'quote' => 'Dulu tiap akhir tahun selalu stres urus SPT Badan dan faktur PPN. Sejak bekerja sama dengan Akuntan.ID, semua pembukuan tersusun rapi tiap tanggal 5, laporan pajak selalu tepat waktu, dan cash flow bisnis jadi transparan.',
                ],
                [
                    'name' => 'Dr. Jessica Wijaya',
                    'role' => 'Founder Klinik Estetika Harmoni',
                    'service' => 'Manajemen Pajak & SPT',
                    'stars' => 5,
                    'quote' => 'Penjelasan Pak Hendra dan tim sangat edukatif dan mudah dimengerti, tidak kaku seperti konsultan konvensional. Saat kami menerima SP2DK, tim langsung sigap membuatkan analisis data bantahan hingga tuntas tanpa denda.',
                ],
                [
                    'name' => 'Reza Fahlevi',
                    'role' => 'Fullstack Developer & Remote Worker Internasional',
                    'service' => 'Paket UMKM & Freelancer',
                    'stars' => 5,
                    'quote' => 'Sebagai freelancer dengan klien luar negeri, saya bingung sekali cara hitung pajak dan norma NPPN. Akuntan Indonesia .ID membantu memetakan semuanya sampai tuntas dengan biaya yang sangat masuk akal.',
                ],
            ];
        }

        return view('pages.home', compact(
            'profile',
            'vision',
            'missionPillars',
            'coreValues',
            'services',
            'packages',
            'comparisons',
            'audiences',
            'articles',
            'faqs',
            'testimonials'
        ));
    }

    public function serviceDetail($slug)
    {
        return redirect()->route('home', ['#layanan']);
    }

    public function articleIndex(Request $request)
    {
        $profile = $this->getProfileData();
        $allArticles = $this->getArticlesList();

        $selectedCategory = $request->query('kategori');
        $searchQuery = trim($request->query('q', ''));

        $articles = $allArticles;

        if ($selectedCategory && $selectedCategory !== 'all') {
            $articles = array_values(array_filter($articles, function ($a) use ($selectedCategory) {
                return strcasecmp($a['category'], $selectedCategory) === 0;
            }));
        }

        if ($searchQuery !== '') {
            $articles = array_values(array_filter($articles, function ($a) use ($searchQuery) {
                return stripos($a['title'], $searchQuery) !== false
                    || stripos($a['excerpt'], $searchQuery) !== false
                    || stripos($a['category'], $searchQuery) !== false;
            }));
        }

        $categories = array_values(array_unique(array_column($allArticles, 'category')));

        return view('pages.articles-index', compact('profile', 'articles', 'categories', 'selectedCategory', 'searchQuery', 'allArticles'));
    }

    public function articleDetail($slug)
    {
        $profile = $this->getProfileData();
        $articles = $this->getArticlesList();

        $article = collect($articles)->firstWhere('slug', $slug);

        if (! $article) {
            abort(404);
        }

        $relatedArticles = collect($articles)
            ->where('slug', '!=', $slug)
            ->take(3)
            ->values()
            ->all();

        return view('pages.article-detail', compact('profile', 'article', 'relatedArticles'));
    }

    public function sitemap()
    {
        $baseUrl = config('app.url', 'http://localhost:8000');
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $urls = [
            ['loc' => $baseUrl.'/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/#layanan', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/#misi-nilai', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/#paket', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/#perbandingan', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl.'/#berita', 'priority' => '0.8', 'changefreq' => 'daily'],
            ['loc' => $baseUrl.'/berita', 'priority' => '0.9', 'changefreq' => 'daily'],
            ['loc' => $baseUrl.'/#faq', 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl.'/#kontak', 'priority' => '0.8', 'changefreq' => 'monthly'],
        ];

        foreach ($this->getArticlesList() as $art) {
            $urls[] = [
                'loc' => $baseUrl.'/berita/'.$art['slug'],
                'priority' => '0.8',
                'changefreq' => 'monthly',
            ];
        }

        foreach ($urls as $u) {
            $xml .= '<url>';
            $xml .= '<loc>'.htmlspecialchars($u['loc']).'</loc>';
            $xml .= '<lastmod>'.date('Y-m-d').'</lastmod>';
            $xml .= '<changefreq>'.$u['changefreq'].'</changefreq>';
            $xml .= '<priority>'.$u['priority'].'</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'text/xml');
    }

    public function robots()
    {
        $baseUrl = config('app.url', 'http://localhost:8000');
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= 'Sitemap: '.$baseUrl."/sitemap.xml\n";

        return response($content, 200)->header('Content-Type', 'text/plain');
    }

    public function submitConsultation(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'telepon' => 'required|string|max:30',
            'bisnis' => 'nullable|string|max:100',
            'kebutuhan' => 'required|string|max:200',
            'pesan' => 'nullable|string|max:1000',
        ]);

        try {
            Consultation::create([
                'nama' => $validated['nama'],
                'telepon' => $validated['telepon'],
                'bisnis' => $validated['bisnis'] ?? null,
                'kebutuhan' => $validated['kebutuhan'],
                'pesan' => $validated['pesan'] ?? null,
                'status' => 'baru',
            ]);
        } catch (\Throwable $e) {
            // gracefully continue to WhatsApp redirection even if db fail
        }

        $waNumber = env('WA_NUMBER', '6281945077770');
        $text = "Halo Akuntan.ID, saya ingin konsultasi:\n\n".
                "• Nama: {$validated['nama']}\n".
                "• No. Telp/WA: {$validated['telepon']}\n".
                '• Jenis Usaha: '.($validated['bisnis'] ?? '-')."\n".
                "• Kebutuhan: {$validated['kebutuhan']}\n".
                '• Pesan Tambahan: '.($validated['pesan'] ?? '-');

        $waUrl = "https://wa.me/{$waNumber}?text=".urlencode($text);

        return response()->json([
            'status' => 'success',
            'message' => 'Terima kasih! Kami akan segera menyambungkan konsultasi Anda ke WhatsApp resmi.',
            'redirect_url' => $waUrl,
        ]);
    }

    public function getProfileData(): array
    {
        return [
            'firm_name' => 'Akuntan Indonesia .ID',
            'sub_firm' => 'Finance & Tax Partner',
            'brand_name' => 'Akuntan.ID',
            'tagline' => 'Your Next-Gen Finance & Tax Partner',
            'subtitle' => 'Satu Solusi Tepat untuk Seluruh Masalah Keuangan. Kami membantu merapikan pembukuan, menata kepatuhan pajak, dan menghadirkan laporan keuangan yang transparan biar Anda bisa fokus scale up bisnis tanpa hambatan.',
            'about_p1' => 'Sebagai Kantor Jasa Akuntansi dan Kantor Konsultan Pajak resmi berizin Kementerian Keuangan RI, kami hadir bukan sekadar untuk mencatat angka atau menghitung kewajiban pajak Anda. Melalui Akuntan Bisnis Indonesia (Akuntan.ID), kami memosisikan diri sebagai Next-Gen Finance & Tax Partner—mitra generasi baru yang menggabungkan kepatuhan regulasi, efisiensi digital, dan strategi finansial secara adaptif.',
            'about_p2' => 'Kami membantu business owner merapikan sistem pembukuan, menata manajemen perpajakan, dan menyajikan laporan keuangan yang transparan serta akurat. Bersama ekosistem layanan yang terpadu, Anda dapat fokus mengembangkan (scale up) bisnis tanpa perlu khawatir dengan kompleksitas tata kelola keuangan.',
            'owner' => [
                'name' => 'Hendra Setiyawan, S.E., M.Ak., Ak., CA',
                'title' => 'Managing Partner & Kuasa Hukum Pengadilan Pajak',
                'bio' => 'Praktisi akuntan profesional dan kuasa hukum pengadilan pajak berizin resmi Kementerian Keuangan Republik Indonesia. Berpengalaman luas dalam restrukturisasi keuangan, audit review, perencanaan pajak (tax planning), serta pendampingan sengketa dan litigasi di Pengadilan Pajak.',
                'credentials' => [
                    'Akuntan Beregister Negara (Kemenkeu RI)',
                    'Anggota Utama Ikatan Akuntan Indonesia (IAI)',
                    'Chartered Accountant (CA - CAW)',
                    'Kuasa Hukum Resmi Pengadilan Pajak RI',
                    'Konsultan Akuntansi & Pajak UMKM s.d. Korporasi',
                ],
                'photo' => asset('images/owner-hendra-setiyawan.png'),
            ],
            'mascot' => [
                'full' => asset('images/mascot-full.jpg'),
                'standing' => asset('images/mascot-standing.jpg'),
                'solusi' => asset('images/mascot-solusi.jpg'),
                'optimis' => asset('images/mascot-optimis.jpg'),
                'profesional' => asset('images/mascot-profesional.jpg'),
                'pajak' => asset('images/mascot-pajak.jpg'),
                'tumbuh' => asset('images/mascot-tumbuh.jpg'),
                'sambut' => asset('images/mascot-sambut.jpg'),
            ],
            'contact' => [
                'phone' => '+62 819-4507-7770',
                'wa_number' => env('WA_NUMBER', '6281945077770'),
                'email' => 'halo@akuntanindonesia.id',
                'address' => 'Batam Center Commercial Area, Kota Batam, Kepulauan Riau, Indonesia',
                'hours' => 'Senin – Jumat: 08.30 – 17.30 WIB | Konsultasi Darurat 24/7',
                'coverage' => 'Kota Batam (Tatap Muka) & Layanan Digital Remote Seluruh Indonesia',
            ],
            'stats' => [
                ['num' => '10+', 'label' => 'Layanan Keuangan & Pajak Terpadu', 'icon' => '🚀'],
                ['num' => '150+', 'label' => 'Klien Bisnis & UMKM Terbantu', 'icon' => '🏢'],
                ['num' => '99.8%', 'label' => 'Laporan Tepat Waktu & Akurat', 'icon' => '⏱️'],
                ['num' => '100%', 'label' => 'Legalitas Kemenkeu & Berizin Resmi', 'icon' => '⚖️'],
            ],
        ];
    }

    public function getArticlesList(): array
    {
        try {
            $dbArticles = Article::where('is_published', true)
                ->latest()
                ->get()
                ->map(function ($a) {
                    return [
                        'slug' => $a->slug,
                        'title' => $a->title,
                        'category' => $a->category,
                        'date' => $a->date_formatted ?: $a->created_at->isoFormat('D MMMM Y'),
                        'read_time' => $a->read_time,
                        'author' => $a->author,
                        'author_role' => $a->author_role,
                        'excerpt' => $a->excerpt,
                        'highlights' => $a->highlights ?: [],
                        'content' => $a->content,
                        'tags' => $a->tags ?: [],
                    ];
                })
                ->toArray();

            if (! empty($dbArticles)) {
                return $dbArticles;
            }
        } catch (\Throwable $e) {
            // fallback if table does not exist
        }

        return [
            [
                'slug' => 'panduan-coretax-djp-bagi-umkm-dan-perusahaan',
                'title' => 'Panduan Coretax DJP Terbaru: Apa yang Wajib Dipersiapkan Pelaku Usaha?',
                'category' => 'Regulasi Pajak',
                'date' => '04 September 2026',
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
            ],
            [
                'slug' => 'trik-kelola-pembukuan-umkm-bebas-pusing',
                'title' => '5 Kesalahan Fatal Pembukuan Bisnis UMKM yang Sering Memicu Denda Pajak',
                'category' => 'Tips Akuntansi',
                'date' => '28 Agustus 2026',
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
            ],
            [
                'slug' => 'aturan-pph-final-setengah-persen-uu-hpp',
                'title' => 'Aturan PPh Final 0.5% & Fasilitas Bebas Pajak Omzet Rp 500 Juta Menurut UU HPP',
                'category' => 'Perpajakan UMKM',
                'date' => '15 Agustus 2026',
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
            ],
            [
                'slug' => 'cara-cerdas-merespons-surat-sp2dk-pajak',
                'title' => 'Menerima Surat SP2DK dari Kantor Pajak? Ini 5 Langkah Menjawabnya Secara Sah & Aman',
                'category' => 'Litigasi & Solusi',
                'date' => '10 Agustus 2026',
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
            ],
            [
                'slug' => 'mengapa-bisnis-butuh-laporan-keuangan-sak-emkm',
                'title' => 'Mengapa Bisnis Berkembang Wajib Memiliki Laporan Keuangan Standar SAK EMKM?',
                'category' => 'Standar Keuangan',
                'date' => '02 Agustus 2026',
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
            ],
            [
                'slug' => 'kapan-perusahaan-butuh-kuasa-hukum-pengadilan-pajak',
                'title' => 'Kapan Badan Usaha Membutuhkan Jasa Kuasa Hukum Resmi Pengadilan Pajak?',
                'category' => 'Litigasi & Solusi',
                'date' => '20 Juli 2026',
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
            ],
        ];
    }
}
