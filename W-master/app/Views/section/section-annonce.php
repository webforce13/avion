
    <div class="row">
            <section class="articleList">
            <h2 class="intro-text text-center">Les annonces</h2>
    <article class="filtreList">
        <div class="selectWrapper blue">
            <select id="listSorting" class="select" onchange="listSortingChange(this); xt_click(this,'C','8','ad_search::'+this.options[this.selectedIndex].getAttribute('data-value'),'N');">
                <option value="" data-value="trier_par_date" selected="">Trier par : Date</option>
                <option value="" data-value="trier_par_prix">Trier par : Prix</option>
            </select>
        </div>                
    </article>
    <?php 
    
    $objetPiecesModel = new \Model\PiecesModel;
    $tabResult1 = $objetPiecesModel-> findAll("Designation", "DESC",5,0);

    foreach ($tabResult1 as $index => $tabinfo): 
            
                $designation1 = $tabinfo['Designation'];
                $image1       = $tabinfo['Image'];
                $description1 = $tabinfo['Description'];
    ?>
    
    <!--********************ANNONCE 1 *********************-->

    <!-- lien article -->
    <ul>       
        <li  id="annonce">
            <a href="article" title="<?php echo $designation1 ?>">

    <!-- Liste d'image -->                        
            <div class="item_image">                                
                <span class="item_imagePic"></span>                                 
                <span class="lazyload loaded"><img class="image" itemprop="image" src="<?php echo $image1 ?>" alt="<?php echo $designation1 ?>"></span>
            </div>    
                            
    <!-- Liste d'info -->
            <section class="item_infos">
                <h2 class="item_title" itemprop="name">
                    <?php echo  $designation1; ?>                         
                </h2>  
                                
                </p>
                    <meta itemprop="priceCurrency" content="EUR">            
                    <p><?php echo $description1; ?></p>
            </section>
            </a>
                    </li>
                </ul>
                <?php 
                endforeach;
                ?>
            </section>
        
    </div>    
</div>

    
    