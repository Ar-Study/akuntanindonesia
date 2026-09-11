<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $activeTab = $request->query('tab', 'contact');

        $settings = [
            // General
            'firm_name' => Setting::get('firm_name', 'Akuntan Indonesia .ID'),
            'sub_firm' => Setting::get('sub_firm', 'Kantor Jasa Akuntansi & Konsultan Pajak Batam'),
            'brand_name' => Setting::get('brand_name', 'Akuntan.ID'),
            'tagline' => Setting::get('tagline', 'Your Next-Gen Finance & Tax Partner'),
            'subtitle' => Setting::get('subtitle', ''),
            'about_p1' => Setting::get('about_p1', ''),
            'about_p2' => Setting::get('about_p2', ''),

            // Contact
            'company_legal' => Setting::get('company_legal', 'PT. AKUNTAN BISNIS INDONESIA'),
            'phone' => Setting::get('phone', '0811-7777-109'),
            'wa_number' => Setting::get('wa_number', '6281945077770'),
            'email' => Setting::get('email', 'halo@akuntanindonesia.id'),
            'address' => Setting::get('address', ''),
            'maps_url' => Setting::get('maps_url', ''),
            'maps_embed' => Setting::get('maps_embed', ''),
            'hours' => Setting::get('hours', 'Senin – Jumat: 08.30 – 17.00 WIB | Sabtu, Minggu & Hari Libur: Konfirmasi Janji Temu'),
            'coverage' => Setting::get('coverage', 'Kota Batam & Layanan Digital Remote Seluruh Indonesia'),

            // Hero
            'hero_tag_pill' => Setting::get('hero_tag_pill', 'Kantor Jasa Akuntan & Pajak Batam'),
            'hero_headline' => Setting::get('hero_headline', 'Financial Solved, No Stress. Fokus Scale-Up Bisnis Anda.'),
            'hero_subline' => Setting::get('hero_subline', ''),
            'hero_chips' => Setting::get('hero_chips', ['Anti-Ribet & Efisien', '100% Coretax DJP Ready', 'Akuntan Beregister & Konsultan Pajak Kemenkeu']),

            // Stats
            'stats' => Setting::get('stats', [
                ['num' => '10+', 'label' => 'Layanan Keuangan & Pajak Terpadu', 'icon' => '🚀'],
                ['num' => '150+', 'label' => 'Klien Bisnis & UMKM Terbantu', 'icon' => '🏢'],
                ['num' => '99.8%', 'label' => 'Laporan Tepat Waktu & Akurat', 'icon' => '⏱️'],
                ['num' => '100%', 'label' => 'Legalitas Kemenkeu & Berizin Resmi', 'icon' => '⚖️'],
            ]),

            // Founder
            'founder_name' => Setting::get('founder_name', 'Hendra Setiyawan, M.Ak., Ak., BKP., CA., Asean CPA'),
            'founder_title' => Setting::get('founder_title', 'Akuntan Berpraktek & Konsultan Pajak Berizin di Kementerian Keuangan'),
            'founder_bio' => Setting::get('founder_bio', ''),
            'founder_credentials' => Setting::get('founder_credentials', [
                'Register Negara Akuntan',
                'CA - Chartered Accountant',
                'Chartered Accountants Worldwide (CAW)',
                'Pengurus Cabang Asosiasi AKP2I',
            ]),
            'founder_quote' => Setting::get('founder_quote', ''),
            'founder_photo' => Setting::get('founder_photo', 'images/owner-hendra-setiyawan.png'),

            // Vision & Values
            'vision' => Setting::get('vision', ''),
            'mission_pillars' => Setting::get('mission_pillars', []),
            'core_values' => Setting::get('core_values', []),
        ];

        return view('admin.settings.index', compact('settings', 'activeTab'));
    }

    public function update(Request $request)
    {
        $tab = $request->input('tab', 'contact');

        if ($tab === 'contact') {
            $validated = $request->validate([
                'firm_name' => 'required|string|max:255',
                'sub_firm' => 'nullable|string|max:255',
                'brand_name' => 'nullable|string|max:255',
                'tagline' => 'nullable|string|max:255',
                'subtitle' => 'nullable|string|max:1000',
                'about_p1' => 'nullable|string|max:2000',
                'about_p2' => 'nullable|string|max:2000',
                'company_legal' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:50',
                'wa_number' => 'required|string|max:50',
                'email' => 'nullable|email|max:100',
                'address' => 'nullable|string|max:1000',
                'maps_url' => 'nullable|string|max:1000',
                'maps_embed' => 'nullable|string|max:2000',
                'hours' => 'nullable|string|max:255',
                'coverage' => 'nullable|string|max:255',
            ]);

            foreach ($validated as $key => $val) {
                $group = in_array($key, ['firm_name', 'sub_firm', 'brand_name', 'tagline', 'subtitle', 'about_p1', 'about_p2']) ? 'general' : 'contact';
                Setting::set($key, $val, $group, is_string($val) && strlen($val) > 255 ? 'textarea' : 'text');
            }
        } elseif ($tab === 'hero') {
            $validated = $request->validate([
                'hero_tag_pill' => 'nullable|string|max:255',
                'hero_headline' => 'required|string|max:500',
                'hero_subline' => 'nullable|string|max:1500',
                'hero_chips_text' => 'nullable|string',
                'stats_num' => 'nullable|array',
                'stats_label' => 'nullable|array',
                'stats_icon' => 'nullable|array',
            ]);

            Setting::set('hero_tag_pill', $validated['hero_tag_pill'] ?? '', 'hero', 'text');
            Setting::set('hero_headline', $validated['hero_headline'], 'hero', 'text');
            Setting::set('hero_subline', $validated['hero_subline'] ?? '', 'hero', 'textarea');

            // Hero chips
            $chips = [];
            if (! empty($validated['hero_chips_text'])) {
                $lines = preg_split('/\r\n|\r|\n/', $validated['hero_chips_text']);
                $chips = array_values(array_filter(array_map('trim', $lines)));
            }
            Setting::set('hero_chips', $chips, 'hero', 'json');

            // Stats
            $stats = [];
            if (! empty($validated['stats_num']) && is_array($validated['stats_num'])) {
                foreach ($validated['stats_num'] as $idx => $num) {
                    if (! empty($num)) {
                        $stats[] = [
                            'num' => trim($num),
                            'label' => trim($validated['stats_label'][$idx] ?? ''),
                            'icon' => trim($validated['stats_icon'][$idx] ?? '🚀'),
                        ];
                    }
                }
            }
            if (! empty($stats)) {
                Setting::set('stats', $stats, 'stats', 'json');
            }
        } elseif ($tab === 'founder') {
            $validated = $request->validate([
                'founder_name' => 'required|string|max:255',
                'founder_title' => 'nullable|string|max:500',
                'founder_bio' => 'nullable|string|max:2500',
                'founder_credentials_text' => 'nullable|string',
                'founder_quote' => 'nullable|string|max:1500',
                'founder_photo_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            ]);

            Setting::set('founder_name', $validated['founder_name'], 'founder', 'text');
            Setting::set('founder_title', $validated['founder_title'] ?? '', 'founder', 'text');
            Setting::set('founder_bio', $validated['founder_bio'] ?? '', 'founder', 'textarea');
            Setting::set('founder_quote', $validated['founder_quote'] ?? '', 'founder', 'textarea');

            // Credentials list
            $creds = [];
            if (! empty($validated['founder_credentials_text'])) {
                $lines = preg_split('/\r\n|\r|\n/', $validated['founder_credentials_text']);
                $creds = array_values(array_filter(array_map('trim', $lines)));
            }
            Setting::set('founder_credentials', $creds, 'founder', 'json');

            // Photo upload
            if ($request->hasFile('founder_photo_file')) {
                $file = $request->file('founder_photo_file');
                $fileName = 'founder_'.time().'_'.Str::random(6).'.'.$file->getClientOriginalExtension();
                $targetDir = public_path('images/uploads');
                if (! file_exists($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
                $file->move($targetDir, $fileName);
                Setting::set('founder_photo', 'images/uploads/'.$fileName, 'founder', 'text');
            }
        } elseif ($tab === 'vision') {
            $validated = $request->validate([
                'vision' => 'required|string|max:2000',
                'pillar_title' => 'nullable|array',
                'pillar_badge' => 'nullable|array',
                'pillar_desc' => 'nullable|array',
                'pillar_icon' => 'nullable|array',
                'pillar_color' => 'nullable|array',
                'value_title' => 'nullable|array',
                'value_tag' => 'nullable|array',
                'value_desc' => 'nullable|array',
                'value_icon' => 'nullable|array',
            ]);

            Setting::set('vision', $validated['vision'], 'vision_mission', 'textarea');

            // Mission pillars
            $defaultPillars = [
                ['id' => 'm1', 'mascot_img' => 'images/mascot-solusi.jpg', 'mascot_label' => 'Memberi Solusi'],
                ['id' => 'm2', 'mascot_img' => 'images/mascot-profesional.jpg', 'mascot_label' => 'Profesional & Cepat'],
                ['id' => 'm3', 'mascot_img' => 'images/mascot-tumbuh.jpg', 'mascot_label' => 'Semangat Bertumbuh'],
                ['id' => 'm4', 'mascot_img' => 'images/mascot-pajak.jpg', 'mascot_label' => 'Patuh Regulasi'],
            ];

            $pillars = [];
            if (! empty($validated['pillar_title']) && is_array($validated['pillar_title'])) {
                foreach ($validated['pillar_title'] as $idx => $title) {
                    if (! empty($title)) {
                        $pillars[] = [
                            'id' => 'm'.($idx + 1),
                            'title' => trim($title),
                            'badge' => trim($validated['pillar_badge'][$idx] ?? ('Pilar 0'.($idx + 1))),
                            'desc' => trim($validated['pillar_desc'][$idx] ?? ''),
                            'color' => trim($validated['pillar_color'][$idx] ?? 'ruby'),
                            'icon' => trim($validated['pillar_icon'][$idx] ?? '🛡️'),
                            'mascot_img' => $defaultPillars[$idx]['mascot_img'] ?? 'images/mascot-solusi.jpg',
                            'mascot_label' => $defaultPillars[$idx]['mascot_label'] ?? 'Mascot',
                        ];
                    }
                }
            }
            if (! empty($pillars)) {
                Setting::set('mission_pillars', $pillars, 'vision_mission', 'json');
            }

            // Core values
            $values = [];
            if (! empty($validated['value_title']) && is_array($validated['value_title'])) {
                foreach ($validated['value_title'] as $idx => $title) {
                    if (! empty($title)) {
                        $values[] = [
                            'title' => trim($title),
                            'tag' => trim($validated['value_tag'][$idx] ?? ''),
                            'desc' => trim($validated['value_desc'][$idx] ?? ''),
                            'icon' => trim($validated['value_icon'][$idx] ?? '⚡'),
                            'color' => 'ruby',
                        ];
                    }
                }
            }
            if (! empty($values)) {
                Setting::set('core_values', $values, 'vision_mission', 'json');
            }
        }

        return redirect()->route('admin.settings.index', ['tab' => $tab])
            ->with('success', 'Pengaturan berhasil disimpan dan langsung diterapkan ke halaman depan.');
    }
}
