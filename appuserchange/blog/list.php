<?php
$baiviet = new DSBaiviet();
$listbaiviet = $baiviet->getListstatus();
?>
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m anhbiablog" style="background-image: url(<?php echo $homeurl; ?>/images/blog.png);">
    <h2 class="l-text2 caichublog mt-4 t-center">
        Blog
    </h2>
    </section>
<!-- content page -->
<section class="bgwhite p-t-60">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-75 " style="margin-left: 15%;">
                <?php
                    foreach($listbaiviet as $item){
                    ?> 
                <div class="p-r-50 p-r-0-lg">
                    <!-- item blog -->
                    <div class="item-blog p-b-80">
                        <a href="?m=blog&a=detail&id=<?php echo $item['id']; ?>" class="item-blog-img pos-relative dis-block hov-img-zoom">
                        <img src="<?php echo uploads() ?><?php  echo $item['hinhanh'] ?>"  alt="IMG-BLOG">
                        <span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
                        <?php echo $item['created_at'] ?>
                        </span>
                        </a>
                        <div class="item-blog-txt p-t-33">
                            <h4 class="p-b-11">
                                <a href="?m=blog&a=detail&id=<?php echo $item['id']; ?>" class="m-text24">
                                <?php echo $item['tieude'] ;?>
                                </a>
                            </h4>
                            <div class="s-text8 flex-w flex-m p-b-21">
                                <span>
                                By <?php echo $item['nguoiviet'] ;?>
                                <span class="m-l-3 m-r-6">|</span>
                                </span>
                                <span>
                                Home, Life
                                <span class="m-l-3 m-r-6">|</span>
                                </span>
                                <span>
                                8 Comments
                                </span>
                            </div>
                            <p class="p-b-12">
                                <?php echo $item['keyword'] ;?>
                            </p>
                            <a href="?m=blog&a=detail&id=<?php echo $item['id']; ?>" class="s-text20">
                            Continue Reading
                            <i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                    ?>
                <!-- Pagination -->
                <div class="pagination flex-m flex-w p-t-26" style="margin: auto;     margin-left: 30%;">
                    <?php
                        
                        ?>
                </div>
            </div>
            <?php
                
                ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
                <?php
                $demtrang = db_count($DB_BAIVIET, 'id');
                $config = [
                    'total' => $demtrang,
                    'querys' => $id,
                    'limit' => $limit,
                    'url' => 'appuserchange/?m=blog&a=list'
                ];
                $page1 = new Pagination($config);
                ?>
                <?php
                if ($demtrang > $limit) {
                    echo '<div><center><ul class="pagination">' . $page1->getPagination() . '</ul></center></div>';
                }
                ?>
        </div>
        <?php
        if(count($listbaiviet) == 0){
            echo '<div class="col-12"><div class="empty center">Chưa có dữ liệu!</div></div>';
        }
        ?>
    </div>
</section>
