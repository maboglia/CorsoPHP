    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    
    <script type="text/javascript">
    
    function eliminaAjax(argomento){
        var numero_post = argomento;
            $.ajax({
          method: "POST",
          url: "includes/eliminaPost.php",
          data: { id_post: numero_post }
        })
          .done(function( msg ) {
            alert( "Data Saved: " + msg );
          });
    }
    

    
    </script>
  

</body></html>