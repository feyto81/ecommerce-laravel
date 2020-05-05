<h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <?php
                                $all_published_category = DB::table('tbl_category')
                                                        ->where('publication_status',1)
                                                        ->paginate(5);
                            foreach ($all_published_category as $v_category) {?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/product_by_category/'.$v_category->category_id)}}">{{$v_category->category_name}}</a></h4>
                                </div>
                            </div>
                        <?php }?>
                        </div><!--/category-products-->
                        {{$all_published_category->links()}}

                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                  <?php
                                $all_published_manufacture = DB::table('tbl_manufacture')
                                                        ->where('publication_status',1)
                                                        ->paginate(5);
                                foreach ($all_published_manufacture as $v_manufacture) {?>  
                                    <li><a href="{{URL::to('/product_by_manufacture/'.$v_manufacture->manufacture_id)}}"><span class="pull-right"></span>{{$v_manufacture->manufacture_name}}</a></li>
                                     <?php }?>
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                        {{$all_published_manufacture->links()}}
                        