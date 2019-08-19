<?php 

$countPosts = obtener_cantidad_post($blog_config['post_por_pagina'], $conexion);
$count = $countPosts[0][0];

$numero_paginas = numero_paginas($blog_config['post_por_pagina'], $conexion, $count);

?>

<section class="paginacion">
    <ul>
    <?php if(pagina_actual() === 1): ?>
        <li class="disabled"><i class="fas fa-long-arrow-alt-left"></i></li>
    <?php else: ?>
        <li><a href="index.php?p=<?php echo pagina_actual() -1; ?>"><i class="fas fa-long-arrow-alt-left"></i></a></li>
    <?php endif; ?>

   

    <?php if(pagina_actual() == $numero_paginas): ?>
        <li class="disabled"><i class="fas fa-long-arrow-alt-right"></i></li>
    <?php else: ?>
        <li><a href="index.php?p=<?php echo pagina_actual() + 1; ?>"><i class="fas fa-long-arrow-alt-right"></i></a></li>
    <?php endif; ?>
        
    </ul>
</section>