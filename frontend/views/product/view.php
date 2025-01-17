<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\components\MenuWidget;
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?= 
                            MenuWidget::widget(['template' => 'menu']);
                        ?>
                    </div><!--/category-products-->
                
                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->
                    
                    <div class="shipping text-center"><!--shipping-->
                        <img src="/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->
                    
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                        <?= Html::img("@web/images/products/{$product->img}", ['alt' => $product->name, 
                        "style" => 'height:40vh']) ?>
                        </div>

                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <a href=""><img src="/images/product-details/similar1.jpg" alt=""></a>
                                        <a href=""><img src="/images/product-details/similar2.jpg" alt=""></a>
                                        <a href=""><img src="/images/product-details/similar3.jpg" alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href=""><img src="/images/product-details/similar1.jpg" alt=""></a>
                                        <a href=""><img src="/images/product-details/similar2.jpg" alt=""></a>
                                        <a href=""><img src="/images/product-details/similar3.jpg" alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href=""><img src="/images/product-details/similar1.jpg" alt=""></a>
                                        <a href=""><img src="/images/product-details/similar2.jpg" alt=""></a>
                                        <a href=""><img src="/images/product-details/similar3.jpg" alt=""></a>
                                    </div>
                                    
                                </div>

                                <!-- Controls -->
                                <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                                </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                        <?php if ($product->new === 1 && $product->sale === 0): ?>
                            <?= Html::img("@web/images/home/new.png", ['alt' => 'new', 'class' => 'new']) ?>
                        <?php endif; ?>
                        <?php if ($product->sale === 1 && $product->new === 0): ?>
                            <?= Html::img("@web/images/home/sale.png", ['alt' => 'sale', 'class' => 'new']) ?>
                        <?php endif; ?>
                            <h2><?= $product->name ?></h2>
                            <p>Web ID: <?= $product->id ?></p>
                            <img src="/images/product-details/rating.png" alt="rating"/>
                            <span>
                                <span>US <?= $product->price ?></span>
                                <label>Quantity:</label>
                                <input type="text" value="1" id="qty"/>
                                <a type="button" class="btn btn-fefault add-to-cart cart"
                                data-id="<?=$product->id?>">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </a>
                            </span>
                            <?php if ($product->availability === 0 ):?>
                                <p><b>Availability:</b> In Stock</p>
                            <?php else: ?>
                                <p><b>Availability:</b>No in stock</p>
                            <?php endif; ?>
                            <?php if ($product->new !== 0 ):?>
                                <p><b>Condition:</b> New</p>
                            <?php else: ?>
                                <p><b>Condition:</b>no New</p>
                            <?php endif; ?>
                            <p>
                                <b>Brand:</b> 
                                <a href="<?= Url::to(['category/view', 'id' => $product->category->id]) ?>">
                                <?= $product->category->name ?>
                                </a>
                            </p>
                            <a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="share" /></a>
                            <hr/>
                            <?= $product->content ?>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Details</a></li>
                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews (<?= $countReviews ?>)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" >
                        <?php foreach($categoryProducts as $product): ?>    
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                        <?= Html::img("@web/images/products/{$product->img}", [
                                            'alt' => $product->name,
                                            'style' => 'height:20vh'
                                        ]) ?>
                                        <h2>$<?= $product->price ?></h2>
                                        <p><?= $product->name ?></p>
                                        <a href="<?= Url::to(['cart/add', 'id' => $product->id])?>" 
                                            class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                        
                        <div class="tab-pane fade active in" id="reviews" >

                            <div class="col-sm-12">
                               <div class="ajax-reviews">      
                                <?php foreach($reviews as $review): ?>
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i><?=$review->user->username?></a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i><?=$review->date?></a></li>
                                </ul>
                                <p><?=ucfirst($review->text)?></p>
                                <?php endforeach; ?>       
                                </div>            
                            <?php if(!Yii::$app->user->isGuest): ?>

                                <h2><b>Write Your Review</b></h2>
                                <form action="#" class="review" id="review">
                                    <textarea name="review" id="review_textarea"></textarea>
                                    <button type="button" class="btn btn-default pull-right add-to-review" 
                                    data-id="<?=$product->id?>">
                                    Отправить
                                    </button>
                                </form>

                            <?php endif; ?>    
                        </div>
                        
                    </div>
                    </div><!--/category-tab-->
                </div>

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">recommended items</h2>
            
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <?php
                $count = count($recommendedProducts);
                $i = 0; 
                foreach($recommendedProducts as $product): ?>
                <?php if($i % 3 == 0): ?>
                    <div class="item <?php if($i == 0) echo " active"?>">
                <?php endif; ?>	

                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <?= Html::img("@web/images/products/{$product->img}", [
                                    'alt' => $product->name,
                                    'style' => 'height:28vh'
                                ]) ?>
                                <h2>$<?= $product->price ?></h2>
                                <p><a href="<?=Url::to(['product/view', 'id' => $product->id]) ?>"><?= $product->name ?></a></p>
                                <a href="<?= Url::to(['cart/add', 'id' => $product->id])?>" 
                                    class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $i++; if($i % 3 == 0 || $i == $count): ?>
                    </div>
                <?php endif; ?>	
                <?php endforeach; ?>  
                </div>

                    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                    </a>	

            </div>
        </div><!--/recommended_items-->
            
        </div>

        </div>
    </div>
</section>

