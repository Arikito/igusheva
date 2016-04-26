 <?php
        $blogim_title = '';
        $blogim_subtitle = '';
        if(is_search()){
                $blogim_title =  get_search_query();
                $blogim_subtitle = __('Search result for', 'blogim' );
        }else if(is_category()){
                $blogim_title =  single_cat_title( '', false );
                $blogim_subtitle =  __('Browse Category', 'blogim');
        }else if(is_author()){
                global $author;
                $blogim_userdata = get_userdata($author);
                $blogim_title = $blogim_userdata->display_name;
                $blogim_subtitle = __('Browse post by author', 'blogim');
        }else if(is_tag()){
                $blogim_title = single_tag_title('', false);
                $blogim_subtitle = __('Browse tag', 'blogim'); 
        }else if(is_archive()){
                if(is_month()){
                        $blogim_title = single_month_title(' ', false);
                }elseif(is_year()){
                        $blogim_title = get_the_date( 'Y' );
                }elseif(is_date()){
                        $blogim_title = get_the_date('F d, Y');
                }
                $blogim_subtitle = __('Browse archive', 'blogim');
        }
?>
<div id="page-title">
        <div class="container">
                <div class="row">
                        <div class="col-sm-7">
                                <strong class="cat s-10"><span><?php echo $blogim_subtitle;?></span></strong>
                                <h2 class="title"><?php echo $blogim_title;?></h2>
                        </div><!-- end of col -->
                        <div class="col-sm-5">
                                <?php if(function_exists('blogimBread')){blogimBread();}?>
                        </div><!-- end of col -->
                </div><!-- end of row -->
        </div><!-- end of container -->
</div><!-- end of page title -->