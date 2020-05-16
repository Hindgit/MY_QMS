<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<body>
<div class="images">
    <div class="pic">
        add
    </div>
</div>
</body>
<script>
    (function ($) {
        $(document).ready(function () {
            uploadImage()
            function uploadImage() {
                var button = $('.images .pic')
                var uploader = $('<input type="file" accept="image/*" />')
                var images = $('.images')
                button.on('click', function () {
                uploader.click()
              })

              uploader.on('change', function () {
                  var reader = new FileReader()
                  reader.onload = function(event) {
                    images.prepend('<div class="img" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>remove</span></div>')
                  }
                  reader.readAsDataURL(uploader[0].files[0])
              })
                images.on('click', '.img', function () {
                    $(this).remove()
                })
            }
        })
    })(jQuery)
</script>
<style>
.images {
  display: flex;
  flex-wrap:  wrap;
  margin-top: 20px;
}
.images .img,
.images .pic {
  flex-basis: 31%;
  margin-bottom: 10px;
  border-radius: 4px;
}
.images .img {
  width: 112px;
  height: 93px;
  background-size: cover;
  margin-right: 10px;
  background-position: center;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}
.images .img:nth-child(3n) {
  margin-right: 0;
}
.images .img span {
  display: none;
  text-transform: capitalize;
  z-index: 2;
}
.images .img::after {
  content: '';
  width: 100%;
  height: 100%;
  transition: opacity .1s ease-in;
  border-radius: 4px;
  opacity: 0;
  position: absolute;
}
.images .img:hover::after {
  display: block;
  background-color: #000;
  opacity: .5;
}
.images .img:hover span {
  display: block;
  color: #fff;
}
.images .pic {
  background-color: #F5F7FA;
  align-self: center;
  text-align: center;
  padding: 40px 0;
  text-transform: uppercase;
  color: #848EA1;
  font-size: 12px;
  cursor: pointer;
}

@media screen and (max-width: 400px) {
  .wrapper {
    margin-top: 0;
  }
  header {
    flex-direction: column;
  }
  header span {
    text-align: left;
    margin-top: 10px;
  }
  .ways li,
  section input,
  section textarea,
  .select-option .head,
  .select-option .option div {
   font-size: 8px;
  }
  .images .img,
  .images .pic {
    flex-basis: 100%;
    margin-right: 0;
  }
}
</style>

</html>
