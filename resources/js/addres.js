const province = document.getElementById('province');
const regency = document.getElementById('regency');
const district = document.getElementById('district');
const village = document.getElementById('village');

const API_URL = 'https://www.emsifa.com/api-wilayah-indonesia/api';

async function loadProvinces() {
    try {
        const response = await fetch(`${API_URL}/provinces.json`);
        const data = await response.json();

        data.forEach(item => {
            const option = document.createElement('option');

            option.value = item.id;
            option.textContent = item.name;

            province.appendChild(option);
        });
    } catch (error) {
        console.error('Gagal memuat provinsi:', error);
    }
}

province.addEventListener('change', async function () {
    const provinceId = this.value;

    regency.innerHTML = '<option value="">Pilih Kabupaten / Kota</option>';
    district.innerHTML = '<option value="">Pilih Kecamatan</option>';
    village.innerHTML = '<option value="">Pilih Kelurahan / Desa</option>';

    regency.disabled = true;
    district.disabled = true;
    village.disabled = true;

    if (!provinceId) return;

    try {
        const response = await fetch(
            `${API_URL}/regencies/${provinceId}.json`
        );

        const data = await response.json();

        data.forEach(item => {
            const option = document.createElement('option');

            option.value = item.id;
            option.textContent = item.name;

            regency.appendChild(option);
        });

        regency.disabled = false;
    } catch (error) {
        console.error('Gagal memuat Kabupaten/Kota:', error);
    }
});

regency.addEventListener('change', async function () {
    const regencyId = this.value;

    district.innerHTML = '<option value="">Pilih Kecamatan</option>';
    village.innerHTML = '<option value="">Pilih Kelurahan / Desa</option>';

    district.disabled = true;
    village.disabled = true;

    if (!regencyId) return;

    try {
        const response = await fetch(
            `${API_URL}/districts/${regencyId}.json`
        );

        const data = await response.json();

        data.forEach(item => {
            const option = document.createElement('option');

            option.value = item.id;
            option.textContent = item.name;

            district.appendChild(option);
        });

        district.disabled = false;
    } catch (error) {
        console.error('Gagal memuat Kecamatan:', error);
    }
});

district.addEventListener('change', async function () {
    const districtId = this.value;

    village.innerHTML = '<option value="">Pilih Kelurahan / Desa</option>';
    village.disabled = true;

    if (!districtId) return;

    try {
        const response = await fetch(
            `${API_URL}/villages/${districtId}.json`
        );

        const data = await response.json();

        data.forEach(item => {
            const option = document.createElement('option');

            option.value = item.id;
            option.textContent = item.name;

            village.appendChild(option);
        });

        village.disabled = false;
    } catch (error) {
        console.error('Gagal memuat Kelurahan:', error);
    }
});

loadProvinces();