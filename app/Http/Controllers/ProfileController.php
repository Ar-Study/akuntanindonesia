<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
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

        $vision = 'Menjadi Kantor Akuntan dan Konsultan Pajak terdepan yang berintegritas dan profesional dalam menyajikan solusi keuangan komprehensif yang adaptif dengan peraturan terbaru, menjadi mitra strategis dalam menjaga transparansi dan integritas keuangan nasional, serta menjadi pusat pengembangan talenta akuntan muda Indonesia.';

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
                'badge' => 'Favorit Usaha Rintisan',
                'desc' => 'Cocok untuk freelancer, toko online, dan pelaku UMKM Batam yang butuh pembukuan rapi dan SPT terurus tanpa pusing.',
                'is_popular' => false,
                'color' => 'emerald',
                'features' => [
                    'Pencatatan s.d. 150 transaksi / bulan',
                    'Laporan Laba Rugi & Arus Kas sederhana',
                    'Perhitungan & Setor PPh Final 0.5% (UU HPP)',
                    'Konsultasi via WhatsApp di jam kerja',
                    'Gratis Pendampingan SPT Tahunan OP',
                ],
                'cta_text' => 'Konsultasi Paket UMKM',
                'cta_wa' => 'Halo Akuntan.ID, saya tertarik dengan Paket UMKM & Freelancer.',
            ],
            [
                'name' => 'Paket Scale-Up Bisnis',
                'slug' => 'scale-up',
                'badge' => 'Paling Diminati (Best Value)',
                'desc' => 'Dirancang untuk CV / PT berkembang di Batam & Kepri yang membutuhkan kepatuhan pajak & laporan komprehensif.',
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
                'our' => 'Akuntan Beregister Negara + Konsultan Pajak Berizin + Kuasa Hukum Resmi Pengadilan Pajak',
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
                'title' => 'UMKM & Toko Retail / Online Batam',
                'icon' => '🛍️',
                'desc' => 'Pemilik usaha kuliner, fashion, distributor, atau e-commerce yang ingin catatan modal & laba jelas, serta tertib bayar pajak PPh Final 0.5% tanpa pusing.',
                'tags' => ['Omzet < 4.8M', 'Pajak Final 0.5%', 'Laporan Kas & Stok', 'Bebas SP2DK'],
            ],
            [
                'title' => 'Freelancer & Remote Worker Internasional',
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
                'title' => 'Badan Usaha PT, CV & PMA Batam',
                'icon' => '🏛️',
                'desc' => 'Perseroan dan entitas bisnis Free Trade Zone (FTZ) Batam yang memerlukan mitra outsourcing akuntansi profesional, kepatuhan PPN/PPh badan bulanan, dan litigasi pajak.',
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
                        'badge' => $p->badge,
                        'desc' => $p->subtitle,
                        'is_popular' => (bool) $p->is_featured,
                        'color' => $p->is_featured ? 'ruby' : 'indigo',
                        'features' => $p->features ?: [],
                        'cta_text' => 'Konsultasi '.$p->title,
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
            $faqs = [];
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
                        'service' => 'Laporan SAK & Kepatuhan Pajak',
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
                        'service' => 'Pembukuan & SPT Orang Pribadi',
                        'stars' => 5,
                        'quote' => 'Sebagai freelancer dengan klien luar negeri, saya bingung sekali cara hitung pajak dan norma NPPN. Akuntan Indonesia .ID membantu memetakan semuanya sampai tuntas dengan biaya yang sangat masuk akal.',
                    ],
                ];
            }
        } catch (\Throwable $e) {
            $testimonials = [];
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

        $selectedCategory = $request->query('kategori');
        $searchQuery = trim($request->query('q', ''));

        $query = Article::with(['categoryRel', 'authorRel'])->where('is_published', true);

        if ($selectedCategory && $selectedCategory !== 'all') {
            $query->where(function ($q) use ($selectedCategory) {
                $q->where('category', $selectedCategory)
                    ->orWhereHas('categoryRel', function ($cq) use ($selectedCategory) {
                        $cq->where('name', $selectedCategory)
                            ->orWhere('slug', $selectedCategory);
                    });
            });
        }

        if ($searchQuery !== '') {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('title', 'like', "%{$searchQuery}%")
                    ->orWhere('excerpt', 'like', "%{$searchQuery}%")
                    ->orWhere('category', 'like', "%{$searchQuery}%")
                    ->orWhere('author', 'like', "%{$searchQuery}%");
            });
        }

        $articles = $query->latest()->get();

        $categories = Category::orderBy('name')->pluck('name')->toArray();
        if (empty($categories)) {
            $categories = Article::where('is_published', true)->distinct()->pluck('category')->filter()->values()->toArray();
        }

        $totalArticleCount = Article::where('is_published', true)->count();

        return view('pages.articles-index', compact('profile', 'articles', 'categories', 'selectedCategory', 'searchQuery', 'totalArticleCount'));
    }

    public function articleDetail($slug)
    {
        $profile = $this->getProfileData();

        $article = Article::with(['categoryRel', 'authorRel'])
            ->where('slug', $slug)
            ->where('is_published', true)
            ->first();

        if (! $article) {
            abort(404);
        }

        // Increment article views
        $article->increment('views');

        $relatedArticles = Article::with(['categoryRel', 'authorRel'])
            ->where('is_published', true)
            ->where('id', '!=', $article->id)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.article-detail', compact('profile', 'article', 'relatedArticles'));
    }

    public function sitemap()
    {
        $baseUrl = rtrim(config('app.url', 'https://akuntanindonesia.id'), '/');
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $urls = [
            ['loc' => $baseUrl.'/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/#layanan', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/#founder', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/#misi-nilai', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/#perbandingan', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl.'/#berita', 'priority' => '0.8', 'changefreq' => 'daily'],
            ['loc' => $baseUrl.'/berita', 'priority' => '0.9', 'changefreq' => 'daily'],
            ['loc' => $baseUrl.'/#faq', 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl.'/#kontak', 'priority' => '0.8', 'changefreq' => 'monthly'],
        ];

        try {
            $articles = Article::where('is_published', true)->get();
            foreach ($articles as $art) {
                $urls[] = [
                    'loc' => $baseUrl.'/berita/'.$art->slug,
                    'priority' => '0.8',
                    'changefreq' => 'monthly',
                ];
            }
        } catch (\Throwable $e) {
            // fallback
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
        $baseUrl = rtrim(config('app.url', 'https://akuntanindonesia.id'), '/');
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Allow: /css/\n";
        $content .= "Allow: /js/\n";
        $content .= "Allow: /images/\n";
        $content .= "Disallow: /portal-admin/\n";
        $content .= "Disallow: /api/\n";
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
            // continue to WhatsApp redirection even if db fail
        }

        $waNumber = env('WA_NUMBER', '628117777109');
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
            'sub_firm' => 'Kantor Jasa Akuntansi & Konsultan Pajak Batam',
            'brand_name' => 'Akuntan.ID',
            'tagline' => 'Your Next-Gen Finance & Tax Partner',
            'subtitle' => 'Satu Solusi Tepat untuk Seluruh Masalah Keuangan & Pajak Bisnis di Batam & Seluruh Indonesia. Kami membantu merapikan pembukuan, menata kepatuhan pajak, dan menghadirkan laporan keuangan yang transparan biar Anda bisa fokus scale up bisnis tanpa hambatan.',
            'about_p1' => 'Sebagai Kantor Jasa Akuntansi dan Kantor Konsultan Pajak resmi berizin Kementerian Keuangan RI di Kota Batam, kami hadir bukan sekadar untuk mencatat angka atau menghitung kewajiban pajak Anda. Melalui Akuntan Bisnis Indonesia (Akuntan.ID), kami memosisikan diri sebagai Next-Gen Finance & Tax Partner—mitra generasi baru yang menggabungkan kepatuhan regulasi, efisiensi digital, dan strategi finansial secara adaptif.',
            'about_p2' => 'Kami membantu business owner merapikan sistem pembukuan, menata manajemen perpajakan, dan menyajikan laporan keuangan yang transparan serta akurat. Bersama ekosistem layanan yang terpadu, Anda dapat fokus mengembangkan (scale up) bisnis tanpa perlu khawatir dengan kompleksitas tata kelola keuangan.',
            'owner' => [
                'name' => 'Hendra Setiyawan, M.Ak., Ak., BKP., CA., Asean CPA',
                'title' => 'Akuntan Berpraktek & Konsultan Pajak Berizin di Kementerian Keuangan',
                'bio' => 'Akuntan berpraktek, Konsultan Pajak terdaftar dan berizin di Kementerian Keuangan Republik Indonesia. Berpengalaman luas dalam restrukturisasi pembukuan, kepatuhan perpajakan (tax planning & compliance), audit review, serta pendampingan sengketa dan litigasi di Pengadilan Pajak untuk ratusan korporasi dan pelaku usaha.',
                'credentials' => [
                    'Register Negara Akuntan',
                    'CA - Chartered Accountant',
                    'Chartered Accountants Worldwide (CAW)',
                    'Pengurus Cabang Asosiasi AKP2I',
                ],
                'photo' => asset('images/owner-hendra-setiyawan.png'),
            ],
            'mascot' => [
                'full' => asset('images/mascot-standing.png'),
                'standing' => asset('images/mascot-standing.png'),
                'solusi' => asset('images/mascot-solusi.jpg'),
                'optimis' => asset('images/mascot-optimis.jpg'),
                'profesional' => asset('images/mascot-profesional.jpg'),
                'pajak' => asset('images/mascot-pajak.jpg'),
                'tumbuh' => asset('images/mascot-tumbuh.jpg'),
                'sambut' => asset('images/mascot-sambut.jpg'),
            ],
            'contact' => [
                'company_legal' => 'PT. AKUNTAN BISNIS INDONESIA',
                'phone' => '0811-7777-109',
                'wa_number' => env('WA_NUMBER', '628117777109'),
                'email' => 'halo@akuntanindonesia.id',
                'address' => 'Ruko Mega Legenda 2, Blk. B2 No.3A, Baloi Permai, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29444',
                'maps_url' => 'https://www.google.com/maps/place/PT.+AKUNTAN+BISNIS+INDONESIA+(Konsultan+Pajak+Dan+Keuangan)/@1.1416011,104.0296512,17z/data=!3m1!4b1!4m6!3m5!1s0x31d98d2dda714a13:0xd2b1359e2dfdd1a4!8m2!3d1.1416011!4d104.0296512!16s%2Fg%2F11hz_1g3sg?entry=ttu&g_ep=EgoyMDI2MDkwMi4wIKXMDSoASAFQAw%3D%3D',
                'maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.026380398077!2d104.02965119999999!3d1.1416010999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98d2dda714a13%3A0xd2b1359e2dfdd1a4!2sPT.%20AKUNTAN%20BISNIS%20INDONESIA%20(Konsultan%20Pajak%20Dan%20Keuangan)!5e0!3m2!1sid!2sid!4v1788990709325!5m2!1sid!2sid',
                'hours' => 'Senin – Jumat: 08.30 – 17.00 WIB | Sabtu, Minggu & Hari Libur: Konfirmasi Janji Temu',
                'hours_weekdays' => 'Senin – Jumat: 08.30 – 17.00 WIB',
                'hours_weekend' => 'Sabtu, Minggu & Hari Libur: Konfirmasi Janji Temu',
                'coverage' => 'Kota Batam (Tatap Muka & On-site) & Layanan Digital Remote Seluruh Indonesia',
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
            $dbArticles = Article::with(['categoryRel', 'authorRel'])
                ->where('is_published', true)
                ->latest()
                ->get();

            if ($dbArticles->isNotEmpty()) {
                return $dbArticles->map(function ($a) {
                    return [
                        'slug' => $a->slug,
                        'title' => $a->title,
                        'category' => $a->category_title,
                        'date' => $a->date_formatted ?: $a->created_at->isoFormat('D MMMM Y'),
                        'read_time' => $a->read_time,
                        'author' => $a->author_name,
                        'author_role' => $a->author_role_title,
                        'author_bio' => $a->author_bio_text,
                        'author_avatar' => $a->author_avatar_url,
                        'excerpt' => $a->excerpt,
                        'highlights' => $a->highlights ?: [],
                        'content' => $a->content,
                        'tags' => $a->tags ?: [],
                    ];
                })->toArray();
            }
        } catch (\Throwable $e) {
            // fallback
        }

        return [];
    }
}
