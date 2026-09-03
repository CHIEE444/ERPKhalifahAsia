const province = document.getElementById("province");
const regency = document.getElementById("regency");
const district = document.getElementById("district");
const village = document.getElementById("village");

const oldProvince = province.dataset.old;
const oldRegency = regency.dataset.old;
const oldDistrict = district.dataset.old;
const oldVillage = village.dataset.old;

const API_URL = "https://www.emsifa.com/api-wilayah-indonesia/api";

async function loadProvinces() {
    try {
        const response = await fetch(`${API_URL}/provinces.json`);
        const data = await response.json();

        data.forEach((item) => {
            const option = document.createElement("option");

            option.value = item.id;
            option.textContent = item.name;

            if (String(item.id) === String(oldProvince)) {
                option.selected = true;
            }

            province.appendChild(option);
        });

        // Kalau ada old province, lanjut load regency
        if (oldProvince) {
            await loadRegencies(oldProvince);
        }
    } catch (error) {
        console.error("Gagal memuat provinsi:", error);
    }
}

async function loadRegencies(provinceId) {
    regency.innerHTML = '<option value="">Pilih Kabupaten / Kota</option>';

    district.innerHTML = '<option value="">Pilih Kecamatan</option>';

    village.innerHTML = '<option value="">Pilih Kelurahan / Desa</option>';

    regency.disabled = true;
    district.disabled = true;
    village.disabled = true;

    if (!provinceId) return;

    try {
        const response = await fetch(`${API_URL}/regencies/${provinceId}.json`);

        const data = await response.json();

        data.forEach((item) => {
            const option = document.createElement("option");

            option.value = item.id;
            option.textContent = item.name;

            if (String(item.id) === String(oldRegency)) {
                option.selected = true;
            }

            regency.appendChild(option);
        });

        regency.disabled = false;

        // Kalau ada old regency, lanjut load district
        if (oldRegency) {
            await loadDistricts(oldRegency);
        }
    } catch (error) {
        console.error("Gagal memuat Kabupaten/Kota:", error);
    }
}

async function loadDistricts(regencyId) {
    district.innerHTML = '<option value="">Pilih Kecamatan</option>';

    village.innerHTML = '<option value="">Pilih Kelurahan / Desa</option>';

    district.disabled = true;
    village.disabled = true;

    if (!regencyId) return;

    try {
        const response = await fetch(`${API_URL}/districts/${regencyId}.json`);

        const data = await response.json();

        data.forEach((item) => {
            const option = document.createElement("option");

            option.value = item.id;
            option.textContent = item.name;

            if (String(item.id) === String(oldDistrict)) {
                option.selected = true;
            }

            district.appendChild(option);
        });

        district.disabled = false;

        // Kalau ada old district, lanjut load village
        if (oldDistrict) {
            await loadVillages(oldDistrict);
        }
    } catch (error) {
        console.error("Gagal memuat Kecamatan:", error);
    }
}

async function loadVillages(districtId) {
    village.innerHTML = '<option value="">Pilih Kelurahan / Desa</option>';

    village.disabled = true;

    if (!districtId) return;

    try {
        const response = await fetch(`${API_URL}/villages/${districtId}.json`);

        const data = await response.json();

        data.forEach((item) => {
            const option = document.createElement("option");

            option.value = item.id;
            option.textContent = item.name;

            if (String(item.id) === String(oldVillage)) {
                option.selected = true;
            }

            village.appendChild(option);
        });

        village.disabled = false;
    } catch (error) {
        console.error("Gagal memuat Kelurahan:", error);
    }
}

province.addEventListener("change", function () {
    loadRegencies(this.value);
});

regency.addEventListener("change", function () {
    loadDistricts(this.value);
});

district.addEventListener("change", function () {
    loadVillages(this.value);
});

loadProvinces();