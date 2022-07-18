jQuery.validator.addMethod("lettersonly", function(value, element) {
   return this.optional(element) || /^[a-z," "]+$/i.test(value);
 }, "Hanya menerima inputan huruf"); 

var validobj = $("#form_janjitamu").validate({
   rules:{
      nama_tamu:{
         required: true,
         maxlength: 40,
         lettersonly: true,
      },
      jumlah_tamu:{
         required: true,
      },
      instansi:{
         required: true,
      },
      telpon:{
         required: true,
         digits: true,
      },
      pegawai:{
         required: true,
         min: 1,
      },
      tanggal_janji:{
         required: true,
      },
      jam_janji:{
         required: true,
      },
      urusan:{
         required: true,
      }
   },
   messages:{
      nama_tamu:{
         required: "*Nama tidak boleh kosong",
         maxlength: "*Maksimal 40 karakter",
         lettersonly: "*Hanya menerima inputan huruf",
      },
      jumlah_tamu:{
         required: "*Jumlah tamu tidak boleh kosong",
      },
      instansi:{
         required: "*Instansi asal tidak boleh kosong",
      },
      telpon:{
         required: "*Telepon tidak boleh kosong",
         digits: "*Telepon harus berupa angka",
      },
      pegawai:{
         required: "*Pegawai yang ditemui tidak boleh kosong",
         min: "*Pegawai yang ditemui tidak boleh kosong",
      },
      tanggal_janji:{
         required: "*Tanggal janji tidak boleh kosong",
      },
      jam_janji:{
         required: "*Waktu janji tidak boleh kosong",
      },
      urusan:{
         required: "*Urusan tidak boleh kosong",
      },
   },
   submitHandler: function(form) {
     $(form).submit();
   }
  });

  var validobj2 = $("#form_bukutamu").validate({
   rules:{
      nama_tamu:{
         required: true,
         maxlength: 40,
         lettersonly: true,
      },
      jumlah_tamu:{
         required: true,
      },
      instansi:{
         required: true,
      },
      pegawai:{
         required: true,
         min: 1,
      },
      urusan:{
         required: true,
      }
   },
   messages:{
      nama_tamu:{
         required: "*Nama tidak boleh kosong",
         maxlength: "*Maksimal 40 karakter",
         lettersonly: "*Hanya menerima inputan huruf",
      },
      jumlah_tamu:{
         required: "*Jumlah tamu tidak boleh kosong",
      },
      instansi:{
         required: "*Instansi asal tidak boleh kosong",
      },
      pegawai:{
         required: "*Pegawai yang ditemui tidak boleh kosong",
         min: "*Pegawai yang ditemui tidak boleh kosong",
      },
      urusan:{
         required: "*Urusan tidak boleh kosong",
      },
   },
   submitHandler: function(form) {
     $(form).submit();
   }
  });

  var validobj3 = $("#form_pelayanan").validate({
   rules:{
      nilai:{
         required: true
      },
      kritik_saran:{
         required: true,
      },
   },
   messages:{
      nilai:{
         required: "*Nilai pelayanan tidak boleh kosong",
      },
      kritik_saran:{
         required: "*Kritik/saran/komentar tidak boleh kosong",
      },
   },
   submitHandler: function(form) {
     $(form).submit();
   }
  });

  $(document).on("change", ".select2-offscreen", function() {
   validobj.form();
   validobj2.form();
   validobj3.form();
   });