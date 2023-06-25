<!-- Kontak -->
    <section class="kontak" id="kontak">
      <div class="container">
        <div class="row text-center">
          <div class="col-md">
            <h2>Kontak</h2>
          </div>
        </div>
        <div class="row mt-4 justify-content-center">
          <div class="col-md-5 mb-4">
            <div class="card peta">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3388.1053633574365!2d110.02314577424362!3d-6.94722736801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e704176a8be4b8b%3A0x92bc3f84ca056a78!2sJl.%20Ps.%20Krengseng%2C%20Krajan%2C%20Krengseng%2C%20Kec.%20Gringsing%2C%20Kabupaten%20Batang%2C%20Jawa%20Tengah%2051281!5e1!3m2!1sid!2sid!4v1672749105776!5m2!1sid!2sid"
                height="400"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <form action="simpan.php" method="post" name="myform">
              <label for="nama">Nama :</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama " required />
              <label for="email">Email :</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="xxxxxxx@gmail.com" required />
              <label for="telpon">No Telpon :</label>
              <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Masukan No Telepon " required />
              <label for="pesan">Pesan :</label>
              <textarea class="form-control" id="pesan" rows="4" name="pesan" placeholder="Isi Pesan Anda"></textarea>
              <input class="btn btn-primary mt-2" type="submit" name="simpan" value="Kirim" />
              <input class="btn btn-danger mt-2" type="reset" value="Batal" />
            </form>
          </div>
        </div>
      </div>
    </section>
<!-- Akhir Kontak -->