
    <!-- selectize JS -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
      integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <!-- end modal tambah penggunaan kendaraan -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

    <!-- fontAwesome -->
    <script
      src="https://kit.fontawesome.com/550ef706f2.js"
      crossorigin="anonymous"
    ></script>

		<!-- selectize -->
	<script>
		$("#normalize").selectize({normalize:true});
	</script>

   	<script>
		 <?php 
    foreach ($booking_kendaraan as $bk){ ?>
  	$("#normalizer-<?=$bk->id_kendaraan; ?>").selectize({ normalize: true });
			<?php } ?>
	</script>


<!-- script DataTable -->
	<script>
      new DataTable("#dataTable", {
        info: true,
        ordering: true,
        lengthChange: true,
      });
    </script>


 <script>
      $("#hide").show();
      setTimeout(function () {
        $("#hide").hide();
      }, 3000);
    </script>
</body>
</html>
