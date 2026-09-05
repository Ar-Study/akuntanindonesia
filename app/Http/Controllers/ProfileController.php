<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = [
            'firm_name' => 'Akuntan Indonesia .ID',
            'sub_firm' => 'KJA Hendra Setiyawan',
            'brand_name' => 'AkuntanIndonesia.id',
            'tagline' => 'Your Next-Gen Finance & Tax Partner',
            'subtitle' => 'Satu Solusi Tepat untuk Seluruh Masalah Keuangan & Pajak. Kami merapikan pembukuan, menata kepatuhan pajak optimal, dan menyajikan laporan keuangan transparan agar Anda bebas fokus scale up bisnis tanpa hambatan.',
            'owner' => [
                'name' => 'Hendra Setiyawan, S.E., M.Ak., Ak., CA',
                'title' => 'Managing Partner & Kuasa Hukum Pengadilan Pajak',
                'bio' => 'Praktisi akuntan profesional dan kuasa hukum pengadilan pajak berizin resmi Kementerian Keuangan Republik Indonesia. Berpengalaman dalam menangani restrukturisasi keuangan, audit review, perencanaan pajak (tax planning), serta pendampingan sengketa dan litigasi di Pengadilan Pajak.',
                'credentials' => [
                    'Akuntan Beregister Negara (Kemenkeu RI)',
                    'Anggota Utama Ikatan Akuntan Indonesia (IAI)',
                    'Chartered Accountant (CA - CAW)',
                    'Kuasa Hukum Resmi Pengadilan Pajak RI',
                    'Konsultan Akuntansi & Pajak UMKM s.d. Korporasi'
                ],
                'photo' => asset('images/owner-hendra-setiyawan.png'),
            ],
            'contact' => [
                'phone' => '+62 819-4507-7770',
                'wa_number' => env('WA_NUMBER', '6281945077770'),
                'email' => 'halo@akuntanindonesia.id',
                'address' => 'Batam Center Commercial Area, Kota Batam, Kepulauan Riau, Indonesia',
                'hours' => 'Senin – Jumat: 08.30 – 17.30 WIB | Konsultasi Darurat 24/7',
                'coverage' => 'Kota Batam (Tatap Muka) & Layanan Digital Seluruh Indonesia'
            ],
            'stats' => [
                ['num' => '150+', 'label' => 'Klien Bisnis & UMKM Terbantu', 'icon' => '🏢'],
                ['num' => '99.8%', 'label' => 'Kepatuhan & Laporan Tepat Waktu', 'icon' => '⏱️'],
                ['num' => 'Rp 0', 'label' => 'Denda Keterlambatan Pajak Klien', 'icon' => '🛡️'],
                ['num' => '100%', 'label' => 'Legalitas Kemenkeu & Berizin Resmi', 'icon' => '⚖️'],
            ]
        ];

        $services = [
            [
                'id' => 'pembukuan',
                'title' => 'Pembukuan (Bookkeeping) & Kompilasi SAK',
                'badge' => 'Pondasi Bisnis Rapi',
                'color' => 'ruby',
                'icon' => 'ledger',
                'desc' => 'Solusi catatan keuangan rapi tanpa drama. Kami mencatat semua transaksi harian dari pemasukan sampai pengeluaran, agar Anda tahu persis kemana arah cash flow dan siap diolah menjadi Laporan Keuangan formal sesuai standar SAK EMKM / EP.',
                'points' => [
                    'Pencatatan transaksi harian & rekonsiliasi bank otomatis',
                    'Monitoring arus kas (cash flow tracking) real-time',
                    'Laporan Laba Rugi, Neraca, dan Perubahan Modal bulanan',
                    'Kompilasi laporan siap presentasi ke investor & perbankan'
                ]
            ],
            [
                'id' => 'perpajakan',
                'title' => 'Manajemen Pajak & Tax Planning Legal',
                'badge' => 'Bebas Cemas Pajak',
                'color' => 'gold',
                'icon' => 'tax',
                'desc' => 'Layanan perpajakan komprehensif mulai dari perhitungan rutin, pelaporan SPT bulanan/tahunan (PPh 21, 23, Final UMKM 0.5%, PPN), hingga perencanaan pajak (tax planning) legal yang mengoptimalkan efisiensi cash flow bisnis.',
                'points' => [
                    'Perhitungan & Pelaporan SPT Masa & Tahunan Badan/OP',
                    'Optimalisasi tarif PPh Final UMKM 0.5% (UU HPP)',
                    'Perencanaan Pajak (Tax Planning) legal & terukur',
                    'Review kepatuhan perpajakan sebelum terbit SP2DK'
                ]
            ],
            [
                'id' => 'kuasa-hukum',
                'title' => 'Kuasa Hukum Pengadilan Pajak & SP2DK',
                'badge' => 'Litigasi & Pembelaan Resmi',
                'color' => 'crimson',
                'icon' => 'law',
                'desc' => 'Didampingi langsung oleh Kuasa Hukum Pengadilan Pajak resmi Kementerian Keuangan RI. Kami siap mendampingi pemeriksaan pajak, menyusun tanggapan SP2DK berbobot hukum, hingga memperjuangkan hak perpajakan Anda di Pengadilan Pajak.',
                'points' => [
                    'Izin Resmi Kuasa Hukum Pengadilan Pajak RI',
                    'Penyusunan tanggapan SP2DK & Berita Acara Pemeriksaan',
                    'Pengajuan Surat Keberatan, Banding, dan Gugatan Pajak',
                    'Mitigasi risiko denda & penetapan sepihak DJP'
                ]
            ],
            [
                'id' => 'akuntansi-manajemen',
                'title' => 'Akuntansi Manajemen & Strategi Finansial',
                'badge' => 'Data-Driven Growth',
                'color' => 'emerald',
                'icon' => 'strategy',
                'desc' => 'Sajikan data keuangan internal khusus bahan telaah tim eksekutif. Analisis biaya (cost accounting), simulasi profit margin per lini produk, dan analisis data-driven agar keputusan ekspansi bisnis tepat sasaran.',
                'points' => [
                    'Analisis profit margin per unit produk/layanan',
                    'Penyusunan Rencana Kerja & Anggaran Biaya (Budgeting)',
                    'Analisis Titik Impas (Break-Even Point) operasional',
                    'Monthly Executive Financial Health Report'
                ]
            ],
            [
                'id' => 'sistem-informasi',
                'title' => 'Setup Sistem Informasi Akuntansi Cloud',
                'badge' => 'Efisiensi Digital',
                'color' => 'indigo',
                'icon' => 'system',
                'desc' => 'Tinggalkan pencatatan manual yang rentan bocor dan lambat. Kami merancang dan mengintegrasikan sistem informasi akuntansi berbasis cloud (Jurnal, Accurate, Zahir) yang pas dengan operasional bisnis modern.',
                'points' => [
                    'Setup software akuntansi cloud & POS multi-cabang',
                    'Standard Operating Procedure (SOP) tim admin keuangan',
                    'Integrasi pembukuan dengan invoicing otomatis',
                    'Training pendampingan staf keuangan perusahaan'
                ]
            ],
            [
                'id' => 'aup-gcg',
                'title' => 'Agreed-Upon Procedures (AUP) & Tata Kelola GCG',
                'badge' => 'Transparansi & Akuntabilitas',
                'color' => 'violet',
                'icon' => 'report',
                'desc' => 'Penugasan investigasi atau evaluasi spesifik pada pos keuangan tertentu sesuai request Anda, serta penyusunan kerangka Good Corporate Governance (GCG) agar bisnis tepercaya di mata mitra dan investor.',
                'points' => [
                    'Investigasi & audit pos keuangan tertentu (AUP)',
                    'Penyusunan kerangka Good Corporate Governance',
                    'Review sistem pengendalian internal (Internal Control)',
                    'Dokumentasi formal kepatuhan tata kelola bisnis'
                ]
            ]
        ];

        $packages = [
            [
                'name' => 'Paket UMKM & Freelancer',
                'slug' => 'umkm',
                'price' => 'Mulai Rp 750 Ribu',
                'period' => '/ bulan',
                'badge' => 'Favorit Usaha Rintisan',
                'desc' => 'Cocok untuk freelancer, konsultan, toko online, dan pelaku UMKM yang ingin pembukuan rapi dan SPT terurus tanpa repot.',
                'is_popular' => false,
                'features' => [
                    'Pencatatan hingga 150 transaksi / bulan',
                    'Laporan Laba Rugi & Arus Kas sederhana',
                    'Perhitungan & Setor PPh Final 0.5%',
                    'Konsultasi via WhatsApp di jam kerja',
                    'Gratis Lapor SPT Tahunan Orang Pribadi'
                ],
                'cta_text' => 'Pilih Paket UMKM',
                'cta_wa' => 'Halo KJA Hendra Setiyawan, saya tertarik dengan Paket UMKM & Freelancer.'
            ],
            [
                'name' => 'Paket Scale-Up Bisnis',
                'slug' => 'scale-up',
                'price' => 'Mulai Rp 2.5 Juta',
                'period' => '/ bulan',
                'badge' => 'Paling Diminati (Best Value)',
                'desc' => 'Dirancang untuk CV / PT berkembang dengan volume transaksi aktif yang membutuhkan kepatuhan pajak komprehensif.',
                'is_popular' => true,
                'features' => [
                    'Pencatatan hingga 500 transaksi / bulan',
                    'Laporan Keuangan Standar SAK EMKM / EP',
                    'Kompilasi SPT Masa PPh 21, 23, dan PPN',
                    'Tax Planning & Review Kepatuhan Bulanan',
                    'Pendampingan jika menerima SP2DK dari DJP',
                    'Meeting evaluasi berkala via Zoom / Tatap Muka'
                ],
                'cta_text' => 'Konsultasi Paket Scale-Up',
                'cta_wa' => 'Halo KJA Hendra Setiyawan, saya ingin konsultasi Paket Scale-Up Bisnis.'
            ],
            [
                'name' => 'Paket Corporate & Litigasi',
                'slug' => 'corporate',
                'price' => 'Custom Sesuai Kebutuhan',
                'period' => '/ proyek atau retainer',
                'badge' => 'Solusi Korporat & Sengketa',
                'desc' => 'Layanan penuh tingkat eksekutif untuk perseroan, grup usaha, restrukturisasi, atau penanganan sengketa di Pengadilan Pajak.',
                'is_popular' => false,
                'features' => [
                    'Full Outsourcing Keuangan & Akuntansi',
                    'Tata Kelola Perusahaan (Good Corporate Governance)',
                    'Pendampingan Kuasa Hukum Pengadilan Pajak',
                    'Penyusunan Dokumen Transfer Pricing (TP Doc)',
                    'Agreed-Upon Procedures (AUP) khusus',
                    'Dedicated Senior Partner Advisory'
                ],
                'cta_text' => 'Diskusikan Kebutuhan Korporat',
                'cta_wa' => 'Halo KJA Hendra Setiyawan, saya mewakili perusahaan ingin berdiskusi mengenai Paket Corporate & Litigasi.'
            ]
        ];

        $whyUs = [
            [
                'title' => 'High Standard & Agile',
                'tag' => '01 / Presisi',
                'desc' => 'Kerja serba cepat, presisi tinggi, dan selalu terdepan dalam mengikuti pembaruan regulasi perpajakan nasional (termasuk implementasi Coretax DJP).',
                'icon' => '⚡'
            ],
            [
                'title' => 'Radical Transparency',
                'tag' => '02 / Kejujuran',
                'desc' => 'Jujur, memegang teguh kode etik profesi akuntan IAI, serta menjaga kerahasiaan data keuangan klien dengan standar keamanan ketat.',
                'icon' => '🔍'
            ],
            [
                'title' => 'Efficiency First (Anti-Ribet)',
                'tag' => '03 / Efisiensi',
                'desc' => 'Semua urusan akuntansi dan pajak dirapikan lewat alur kerja digital yang praktis, hemat waktu, dan tanpa birokrasi berbelit-belit.',
                'icon' => '⏱️'
            ],
            [
                'title' => 'Growth Mindset & Mentorship',
                'tag' => '04 / Tumbuh Bersama',
                'desc' => 'Bukan sekadar mencatat angka historis, kami bertindak sebagai mitra strategis yang membimbing Anda mengambil keputusan finansial matang.',
                'icon' => '📈'
            ]
        ];

        $audiences = [
            [
                'title' => 'UMKM & Toko Retail / Online',
                'icon' => '🛍️',
                'desc' => 'Pemilik usaha kuliner, fashion, distributor, atau e-commerce yang ingin catatan modal & laba jelas, serta tertib bayar pajak PPh Final 0.5% tanpa pusing.',
                'tags' => ['Omzet < 4.8M', 'Pajak Final 0.5%', 'Laporan Stok & Kas', 'Bebas SP2DK']
            ],
            [
                'title' => 'Freelancer & Digital Creator',
                'icon' => '💻',
                'desc' => 'Developer, designer, agency owner, affiliate marketer, dan content creator dengan penghasilan dalam maupun luar negeri yang bingung menghitung SPT tahunan.',
                'tags' => ['NPPN / Norma', 'Penghasilan Luar Negeri', 'SPT Tahunan OP', 'Konsultasi Coretax']
            ],
            [
                'title' => 'Startup & Perusahaan Scale-Up',
                'icon' => '🚀',
                'desc' => 'Bisnis berkembang yang membutuhkan laporan keuangan formal untuk kebutuhan pitching investor, pencairan kredit perbankan, atau pembagian dividen antar partner.',
                'tags' => ['Standar SAK', 'Pitch Deck Ready', 'Struktur Costing', 'Internal Control']
            ],
            [
                'title' => 'Badan Usaha PT, CV & PMA',
                'icon' => '🏛️',
                'desc' => 'Perseroan dan entitas bisnis yang memerlukan mitra outsourcing akuntansi profesional, kepatuhan PPN/PPh badan bulanan, dan pendampingan sengketa pajak.',
                'tags' => ['Outsourcing Full', 'SPT Badan 1771', 'Faktur Pajak PPN', 'Pengadilan Pajak']
            ]
        ];

        $comparisons = [
            [
                'aspect' => 'Kecepatan Respons & Konsultasi',
                'kja' => 'Cepat via WhatsApp, responsif, proaktif memberi arahan',
                'conventional' => 'Lambat, harus janji temu formal, respons via surat/email',
                'self' => 'Sering bingung cari jawaban di forum internet tanpa kepastian'
            ],
            [
                'aspect' => 'Keahlian & Izin Praktik Resmi',
                'kja' => 'Akuntan Beregister Negara + Kuasa Hukum Pengadilan Pajak',
                'conventional' => 'Bervariasi, seringkali staf junior yang mengerjakan',
                'self' => 'Tidak tersertifikasi, rentan salah hitung regulasi'
            ],
            [
                'aspect' => 'Transparansi Tarif & Biaya',
                'kja' => 'Jelas, transparan di awal, tidak ada biaya siluman',
                'conventional' => 'Seringkali ada biaya tersembunyi per lembar laporan',
                'self' => 'Tampak gratis di awal, namun berisiko denda jutaan rupiah'
            ],
            [
                'aspect' => 'Kesiapan Sistem Digital & Coretax',
                'kja' => '100% Cloud-friendly, siap penuh sistem Coretax DJP',
                'conventional' => 'Masih bergantung dokumen kertas dan tatap muka fisik',
                'self' => 'Kesulitan adaptasi sistem elektronik DJP yang terus berubah'
            ],
            [
                'aspect' => 'Pendampingan Sengketa & SP2DK',
                'kja' => 'Didampingi langsung hingga tuntas di Pengadilan Pajak',
                'conventional' => 'Hanya membuatkan laporan, lepas tangan saat sengketa',
                'self' => 'Panik dan berisiko salah langkah hukum saat dipanggil DJP'
            ]
        ];

        $articles = [
            [
                'slug' => 'panduan-coretax-djp-bagi-umkm-dan-perusahaan',
                'title' => 'Panduan Coretax DJP Terbaru: Apa yang Wajib Dipersiapkan Pelaku Usaha?',
                'category' => 'Regulasi Pajak',
                'date' => '04 September 2026',
                'read_time' => '4 menit baca',
                'excerpt' => 'Sistem Coretax DJP mengintegrasikan layanan administrasi perpajakan secara penuh. Pelajari dampaknya terhadap pelaporan SPT Masa dan Validasi NIK-NPWP bisnis Anda.'
            ],
            [
                'slug' => 'trik-kelola-pembukuan-umkm-bebas-pusing',
                'title' => '5 Kesalahan Fatal Pembukuan Bisnis UMKM yang Sering Memicu Denda Pajak',
                'category' => 'Tips Akuntansi',
                'date' => '28 Agustus 2026',
                'read_time' => '5 menit baca',
                'excerpt' => 'Mencampur rekening pribadi dan bisnis adalah kesalahan paling umum. Simak bagaimana memisahkan cash flow agar terhindar dari denda pemeriksaan pajak.'
            ],
            [
                'slug' => 'aturan-pph-final-setengah-persen-uu-hpp',
                'title' => 'Aturan PPh Final 0.5% & Fasilitas Bebas Pajak Omzet Rp 500 Juta',
                'category' => 'Perpajakan UMKM',
                'date' => '15 Agustus 2026',
                'read_time' => '3 menit baca',
                'excerpt' => 'Berdasarkan UU HPP, wajib pajak orang pribadi UMKM menikmati fasilitas bebas pajak untuk omzet hingga Rp 500 juta per tahun. Bagaimana perhitungannya?'
            ]
        ];

        $faqs = [
            [
                'q' => 'Apakah KJA Hendra Setiyawan memiliki izin resmi dari Kementerian Keuangan?',
                'a' => 'Ya, kami adalah Kantor Jasa Akuntansi (KJA) berizin resmi di bawah pembinaan Kementerian Keuangan RI dan asosiasi profesi Ikatan Akuntan Indonesia (IAI). Selain itu, Managing Partner kami berstatus resmi sebagai Kuasa Hukum Pengadilan Pajak Republik Indonesia.'
            ],
            [
                'q' => 'Bisnis saya berlokasi di luar Batam, apakah bisa menggunakan jasa KJA Hendra Setiyawan?',
                'a' => 'Tentu saja. Kami melayani klien di seluruh Indonesia (Jakarta, Surabaya, Medan, Bali, dll.) secara remote dan digital menggunakan software akuntansi cloud, pertukaran data terenkripsi, dan konsultasi tatap maya via Zoom/Google Meet & WhatsApp.'
            ],
            [
                'q' => 'Bagaimana jika bisnis saya mendapatkan surat teguran atau SP2DK dari Kantor Pajak?',
                'a' => 'Tenang, jangan panik. Tim kami akan membedah latar belakang data yang dipertanyakan oleh DJP, menyusun rekonsiliasi data pendukung, membuatkan draft tanggapan resmi yang berdasar hukum, dan mendampingi Anda berkomunikasi dengan Account Representative (AR).'
            ],
            [
                'q' => 'Berapa lama proses pembuatan laporan keuangan bulanan?',
                'a' => 'Tergantung kelengkapan dokumen transaksi yang diserahkan. Biasanya laporan keuangan bulanan selesai dalam 3 hingga 5 hari kerja setelah data rekening koran dan bukti transaksi diterima secara lengkap.'
            ],
            [
                'q' => 'Bagaimana kerahasiaan data keuangan dan pembukuan bisnis saya dijaga?',
                'a' => 'Kami terikat oleh Kode Etik Profesi Akuntan mengenai kerahasiaan data (confidentiality). Seluruh data transaksi klien disimpan dalam server terenkripsi dan kami siap menandatangani Non-Disclosure Agreement (NDA) sebelum pekerjaan dimulai.'
            ]
        ];

        $testimonials = [
            [
                'name' => 'Budi Pratama',
                'role' => 'Owner PT Digital Niaga Batam (E-Commerce)',
                'service' => 'Paket Scale-Up Bisnis',
                'stars' => 5,
                'quote' => 'Dulu tiap akhir tahun selalu stres urus SPT Badan dan faktur PPN. Sejak bekerja sama dengan KJA Hendra Setiyawan, semua pembukuan tersusun rapi tiap tanggal 5, laporan pajak selalu tepat waktu, dan cash flow bisnis jadi transparan.'
            ],
            [
                'name' => 'Dr. Jessica Wijaya',
                'role' => 'Founder Klinik Estetika Harmoni',
                'service' => 'Manajemen Pajak & SPT',
                'stars' => 5,
                'quote' => 'Penjelasan Pak Hendra sangat edukatif dan mudah dimengerti, tidak kaku seperti konsultan konvensional. Saat kami menerima SP2DK, tim langsung sigap membuatkan analisis data bantahan hingga tuntas tanpa denda.'
            ],
            [
                'name' => 'Reza Fahlevi',
                'role' => 'Fullstack Developer & Remote Worker Internasional',
                'service' => 'Paket UMKM & Freelancer',
                'stars' => 5,
                'quote' => 'Sebagai freelancer dengan klien luar negeri, saya bingung sekali cara hitung pajak dan norma NPPN. KJA Hendra Setiyawan membantu memetakan semuanya sampai tuntas dengan biaya yang sangat masuk akal.'
            ]
        ];

        return view('pages.home', compact(
            'profile',
            'services',
            'packages',
            'whyUs',
            'audiences',
            'comparisons',
            'articles',
            'faqs',
            'testimonials'
        ));
    }

    public function serviceDetail($slug)
    {
        return redirect()->route('home', ['#layanan']);
    }

    public function articleDetail($slug)
    {
        return redirect()->route('home', ['#berita']);
    }

    public function sitemap()
    {
        $baseUrl = config('app.url', 'http://localhost:8080');
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        $urls = [
            ['loc' => $baseUrl . '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/#layanan', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/#paket', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/#kalkulator', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/#kenapa-kami', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/#berita', 'priority' => '0.8', 'changefreq' => 'daily'],
            ['loc' => $baseUrl . '/#faq', 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/#kontak', 'priority' => '0.8', 'changefreq' => 'monthly'],
        ];

        foreach ($urls as $u) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($u['loc']) . '</loc>';
            $xml .= '<lastmod>' . date('Y-m-d') . '</lastmod>';
            $xml .= '<changefreq>' . $u['changefreq'] . '</changefreq>';
            $xml .= '<priority>' . $u['priority'] . '</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'text/xml');
    }

    public function robots()
    {
        $baseUrl = config('app.url', 'http://localhost:8080');
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Sitemap: " . $baseUrl . "/sitemap.xml\n";

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

        $waNumber = env('WA_NUMBER', '6281945077770');
        $text = "Halo KJA Hendra Setiyawan, saya ingin konsultasi:\n" .
                "• Nama: {$validated['nama']}\n" .
                "• No. Telp/WA: {$validated['telepon']}\n" .
                "• Jenis Usaha: " . ($validated['bisnis'] ?? '-') . "\n" .
                "• Kebutuhan: {$validated['kebutuhan']}\n" .
                "• Pesan Tambahan: " . ($validated['pesan'] ?? '-');

        $waUrl = "https://wa.me/{$waNumber}?text=" . urlencode($text);

        return response()->json([
            'status' => 'success',
            'message' => 'Terima kasih! Kami akan segera merespons via WhatsApp.',
            'redirect_url' => $waUrl
        ]);
    }
}
