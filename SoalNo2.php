<!DOCTYPE html>
<html>

<head>
    <title>Form Data Diri</title>
</head>

<body>
    <h1>Form Data Diri</h1>
    <form id="myForm">
        <label for="fullName">Nama Lengkap:</label>
        <input type="text" id="fullName" name="fullName" required>
        <br>

        <label for="birthPlace">Tempat Tanggal Lahir:</label>
        <input type="text" id="birthPlace" name="birthPlace" required>
        <input type="date" id="birthDate" name="birthDate" required>
        <br>

        <label for="address">Alamat:</label>
        <textarea id="address" name="address" required></textarea>
        <br>

        <label>Jenis Kelamin:</label>
        <label for="male">Laki-laki</label>
        <input type="radio" id="male" name="gender" value="Laki-laki" required>
        <label for="female">Perempuan</label>
        <input type="radio" id="female" name="gender" value="Perempuan" required>
        <br>

        <label for="religion">Agama:</label>
        <select id="religion" name="religion" required>
            <option value="" disabled selected>Pilih agama...</option>
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Katolik">Katolik</option>
            <option value="Hindu">Hindu</option>
            <option value="Buddha">Buddha</option>
            <option value="Konghucu">Konghucu</option>
        </select>
        <br>

        <label>Hobi:</label>
        <label for="hobby1">Baca Buku</label>
        <input type="checkbox" id="hobby1" name="hobby[]" value="BacaBuku">
        <label for="hobby2">Olahraga</label>
        <input type="checkbox" id="hobby2" name="hobby[]" value="Olahraga">
        <label for="hobby3">Main Game</label>
        <input type="checkbox" id="hobby3" name="hobby[]" value="MainGame">
        <label for="hobby4">Hiking</label>
        <input type="checkbox" id="hobby4" name="hobby[]" value="Hiking">
        <br>

        <input type="submit" value="Submit">
    </form>

    <script>
        const form = document.getElementById("myForm");
        form.addEventListener("submit", function(event) {
            event.preventDefault();

            const fullName = form.elements.fullName.value;
            const birthPlace = form.elements.birthPlace.value;
            const birthDate = form.elements.birthDate.value;
            const address = form.elements.address.value;
            const gender = form.elements.gender.value;
            const religion = form.elements.religion.value;
            const hobbies = [...form.elements['hobby[]']]
                .filter(input => input.checked)
                .map(input => input.value);

            const message = `
                Nama Lengkap: ${fullName}
                Tempat Tanggal Lahir: ${birthPlace}, ${birthDate}
                Alamat: ${address}
                Jenis Kelamin: ${gender}
                Agama: ${religion}
                Hobi: ${hobbies.join(", ")}
            `;

            alert(message);
        });
    </script>
</body>

</html>