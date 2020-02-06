    </div>
  <script src="http://localhost/jquery.js"></script>
  <script src="http://localhost/oop/libs/js/messagebox.js"></script>
  <script>
    $(document).ready(function() {
      $(".demo-2").click(function() {
        var id = $(this).attr('delete-id');
        $.MessageBox({
          buttonDone: "Yes",
          buttonFail: "No",
          message: "Are You Sure?"
        }).done(function() {
          $.ajax({
            url: 'delete_product.php',
            type: 'POST',
            data: {object_id: id},
            success: function(data) {
              $('a[delete-id="'+data+'"]').parents('tr').hide();
            }
          });
        });
      });
    });
  </script>
</body>
</html>