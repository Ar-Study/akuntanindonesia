/**
 * Akuntan Indonesia .ID (Akuntan Bisnis Indonesia)
 * Interactive JavaScript Engine
 */

document.addEventListener('DOMContentLoaded', function () {
    // 1. Initialize Navbar Scroll Behavior
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', function () {
        if (window.scrollY > 30) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // 2. Initialize Calculator on page load
    calculateTax();

    // 3. Auto-show WhatsApp Tooltip after 4 seconds
    setTimeout(function() {
        const tip = document.getElementById('waTooltip');
        if (tip) tip.style.display = 'block';
    }, 4000);
});

// =========================================================================
// Mobile Navigation Drawer Toggle
// =========================================================================
function toggleNav() {
    const navToggle = document.getElementById('navToggle');
    const mobileDrawer = document.getElementById('mobileDrawer');
    if (navToggle && mobileDrawer) {
        navToggle.classList.toggle('active');
        mobileDrawer.classList.toggle('active');
    }
}

document.getElementById('navToggle')?.addEventListener('click', toggleNav);

// =========================================================================
// WhatsApp Chat Popup Toggle
// =========================================================================
function toggleWaChat() {
    const chatBox = document.getElementById('waChatBox');
    const tooltip = document.getElementById('waTooltip');
    if (chatBox) {
        chatBox.classList.toggle('open');
    }
    if (tooltip) {
        tooltip.style.display = 'none';
    }
}

// =========================================================================
// Interactive Tax Calculator (PPh Final UMKM 0.5% - UU HPP / PP 55)
// =========================================================================
function formatRupiah(number) {
    return 'Rp ' + Math.round(number).toLocaleString('id-ID');
}

function syncRevenueFromInput(val) {
    const num = parseFloat(val) || 0;
    const slider = document.getElementById('revenueSlider');
    if (slider) {
        slider.value = num;
    }
    calculateTax();
}

function syncRevenueFromSlider(val) {
    const input = document.getElementById('monthlyRevenue');
    if (input) {
        input.value = val;
    }
    calculateTax();
}

function calculateTax() {
    const monthlyInput = document.getElementById('monthlyRevenue');
    if (!monthlyInput) return;

    const monthlyRevenue = parseFloat(monthlyInput.value) || 0;
    const annualRevenue = monthlyRevenue * 12;

    const entityType = document.querySelector('input[name="entity_type"]:checked')?.value || 'op';
    const explanationEl = document.getElementById('calcRuleExplanation');

    let ptkp = 0;
    let taxableRevenue = 0;
    let taxDueAnnual = 0;

    if (entityType === 'op') {
        // Wajib Pajak Orang Pribadi UMKM: Omzet kumulatif s.d. Rp 500.000.000 / tahun tidak dikenai PPh
        ptkp = Math.min(annualRevenue, 500000000);
        taxableRevenue = Math.max(0, annualRevenue - ptkp);
        taxDueAnnual = taxableRevenue * 0.005; // 0.5%

        if (explanationEl) {
            explanationEl.innerHTML = 'Untuk <strong>Wajib Pajak Orang Pribadi</strong>, berlaku fasilitas UU HPP: Omzet kumulatif hingga <strong>Rp 500.000.000 / tahun BEBAS PAJAK</strong>. Pajak 0.5% hanya dihitung atas omzet selebihnya.';
        }
    } else {
        // Wajib Pajak Badan (PT, CV, Koperasi): 0.5% dari seluruh omzet bruto
        ptkp = 0;
        taxableRevenue = annualRevenue;
        taxDueAnnual = taxableRevenue * 0.005; // 0.5%

        if (explanationEl) {
            explanationEl.innerHTML = 'Untuk <strong>Wajib Pajak Badan (PT / CV)</strong>, PPh Final 0.5% langsung dihitung dari <strong>seluruh peredaran bruto bulanan</strong> tanpa fasilitas batas bebas pajak.';
        }
    }

    const taxDueMonthly = taxDueAnnual / 12;

    // Update DOM text
    const annualRevenueEl = document.getElementById('annualRevenueText');
    const ptkpEl = document.getElementById('ptkpText');
    const taxableRevenueEl = document.getElementById('taxableRevenueText');
    const taxDueEl = document.getElementById('taxDueText');
    const taxDueMonthlySubEl = document.getElementById('taxDueMonthlySub');

    if (annualRevenueEl) annualRevenueEl.textContent = formatRupiah(annualRevenue);
    if (ptkpEl) ptkpEl.textContent = ptkp > 0 ? formatRupiah(ptkp) : 'Rp 0 (Badan Usaha)';
    if (taxableRevenueEl) taxableRevenueEl.textContent = formatRupiah(taxableRevenue);
    if (taxDueEl) taxDueEl.textContent = formatRupiah(taxDueAnnual);
    if (taxDueMonthlySubEl) taxDueMonthlySubEl.textContent = `(atau sekitar ${formatRupiah(taxDueMonthly)} / bulan)`;

    // Update WhatsApp Share Link
    const waShareBtn = document.getElementById('waCalcShareBtn');
    if (waShareBtn) {
        const entityLabel = entityType === 'op' ? 'Orang Pribadi' : 'Badan Usaha (PT/CV)';
        const shareText = `Halo Akuntan.ID, saya baru saja melakukan simulasi PPh Final UMKM di website:\n` +
            `• Entitas: ${entityLabel}\n` +
            `• Estimasi Omzet Bulanan: ${formatRupiah(monthlyRevenue)}\n` +
            `• Omzet Tahunan: ${formatRupiah(annualRevenue)}\n` +
            `• Estimasi PPh Final 0.5%: ${formatRupiah(taxDueAnnual)} / tahun\n\n` +
            `Saya ingin konsultasi lebih lanjut terkait kepatuhan dan pelaporan SPT bisnis saya.`;

        waShareBtn.href = `https://wa.me/6281945077770?text=${encodeURIComponent(shareText)}`;
    }
}

// =========================================================================
// FAQ Accordion & Live Filter Search
// =========================================================================
function toggleFaq(btn) {
    const item = btn.closest('.faq-item');
    const panel = item.querySelector('.faq-answer-panel');
    const isOpen = item.classList.contains('is-open');

    // Close all other open items for cleaner UX
    document.querySelectorAll('.faq-item.is-open').forEach(openItem => {
        if (openItem !== item) {
            openItem.classList.remove('is-open');
            openItem.querySelector('.faq-answer-panel').style.maxHeight = null;
        }
    });

    if (isOpen) {
        item.classList.remove('is-open');
        panel.style.maxHeight = null;
    } else {
        item.classList.add('is-open');
        panel.style.maxHeight = panel.scrollHeight + 30 + 'px';
    }
}

function filterFaq(query) {
    const q = query.trim().toLowerCase();
    const items = document.querySelectorAll('.faq-item');

    items.forEach(item => {
        const question = item.getAttribute('data-question') || '';
        const answer = item.getAttribute('data-answer') || '';

        if (!q || question.includes(q) || answer.includes(q)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

// =========================================================================
// Quick Consultation Form Submission
// =========================================================================
async function handleConsultationSubmit(e) {
    e.preventDefault();

    const form = e.target;
    const submitBtn = document.getElementById('formSubmitBtn');
    const alertBox = document.getElementById('formAlertBox');

    const nama = form.nama.value.trim();
    const telepon = form.telepon.value.trim();
    const bisnis = form.bisnis.value.trim();
    const kebutuhan = form.kebutuhan.value;
    const pesan = form.pesan.value.trim();

    if (!nama || !telepon || !kebutuhan) {
        if (alertBox) {
            alertBox.style.display = 'block';
            alertBox.className = 'form-alert-box error';
            alertBox.textContent = 'Harap lengkapi semua kolom yang bertanda bintang (*).';
        }
        return;
    }

    if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.querySelector('span').textContent = 'Memproses Permintaan...';
    }

    try {
        const csrfToken = document.querySelector('input[name="_token"]')?.value || '';
        const response = await fetch('/api/konsultasi', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                nama: nama,
                telepon: telepon,
                bisnis: bisnis,
                kebutuhan: kebutuhan,
                pesan: pesan
            })
        });

        const data = await response.json();

        if (response.ok && data.status === 'success') {
            if (alertBox) {
                alertBox.style.display = 'block';
                alertBox.className = 'form-alert-box success';
                alertBox.textContent = 'Data berhasil diterima! Mengarahkan ke WhatsApp resmi Akuntan.ID...';
            }

            setTimeout(() => {
                window.open(data.redirect_url, '_blank');
                form.reset();
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.querySelector('span').textContent = 'Kirim & Sambungkan ke WhatsApp Resmi';
                }
            }, 1200);
        } else {
            throw new Error(data.message || 'Terjadi kesalahan sistem.');
        }
    } catch (err) {
        // Fallback directly to client-side WhatsApp link
        const fallbackText = `Halo Akuntan.ID, saya ingin konsultasi:\n` +
            `• Nama: ${nama}\n` +
            `• No. Telp/WA: ${telepon}\n` +
            `• Bisnis: ${bisnis || '-'}\n` +
            `• Kebutuhan: ${kebutuhan}\n` +
            `• Catatan: ${pesan || '-'}`;

        const fallbackUrl = `https://wa.me/6281945077770?text=${encodeURIComponent(fallbackText)}`;

        if (alertBox) {
            alertBox.style.display = 'block';
            alertBox.className = 'form-alert-box success';
            alertBox.textContent = 'Membuka WhatsApp konsultasi resmi...';
        }

        setTimeout(() => {
            window.open(fallbackUrl, '_blank');
            form.reset();
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.querySelector('span').textContent = 'Kirim & Sambungkan ke WhatsApp Resmi';
            }
        }, 1000);
    }
}
