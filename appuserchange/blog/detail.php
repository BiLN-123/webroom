<?php
$obj = new DSBaiviet();
$baiviet = $obj->getRow($id);
if(!$baiviet){
    echo ('<div class= "alert alert-danger">Bài viết không tồn tại</div>');
    exit;
}
?>
<section class="bgwhite p-t-60 p-b-25">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-75" style="margin-left: 15%;">
                <div class="p-r-50 p-r-0-lg">
                    <div class="p-b-40">
                        <div class="blog-detail-img wrap-pic-w">
                            <img src="<?php echo uploads() ?><?php  echo $baiviet['hinhanh'] ?>" alt="IMG-BLOG">
                        </div>
                        <div class="blog-detail-txt p-t-33">
                            <h4 class="p-b-11 m-text24">
                                <?php echo $baiviet['tieude']?>
                            </h4>
                            <div class="s-text8 flex-w flex-m p-b-21">
                                <span>
                                By <?php echo $baiviet['nguoiviet']?>
                                <span class="m-l-3 m-r-6">|</span>
                                </span>
                                <span>
                                <?php echo $baiviet['created_at']?>
                                <span class="m-l-3 m-r-6">|</span>
                                </span>
                                <!-- <span>
                                8 Comments
                                </span> -->
                            </div>
                            <p class="p-b-25">
                                <?php echo $baiviet['noidung']?>
                            </p>
                        </div>

                    </div>
                    <!-- Leave a comment -->
                  <!--   <form class="leave-comment">
                      <h4 class="m-text25 p-b-14">
                          Leave a Comment
                      </h4>
                      <p class="s-text8 p-b-40">
                          Your email address will not be published. Required fields are marked *
                      </p>
                      <textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" name="comment" placeholder="Comment..."></textarea>
                      <div class="fb-comments" data-href="http://localhost/fashe-colorlib-vs3" data-width="" data-numposts="5"></div>
                      <div class="bo12 of-hidden size19 m-b-20">
                          <input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="name" placeholder="Name *">
                          </div>
                          
                          <div class="bo12 of-hidden size19 m-b-20">
                          <input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="email" placeholder="Email *">
                          </div>
                          
                          <div class="bo12 of-hidden size19 m-b-30">
                          <input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="website" placeholder="Website">
                          </div>
                          
                          <div class="w-size24">
                      Button
                      <button class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                          Post Comment
                          </button>
                          </div>
                  </form> -->
                </div>
            </div>
        </div>
    </div>
</section>