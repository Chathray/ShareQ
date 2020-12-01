<?php
$theme['pre']      = '<nav><ul class="pagination justify-content-end">';
$theme['first']    = array('<li class="page-item"><a class="page-link" href="{url}">First</a></li> ', '<li class="page-item disabled"><a class="page-link">First</a></li>');
$theme['previous'] = array('<li class="page-item"><a class="page-link" href="{url}">←</a></li> ', '<li class="page-item disabled"><a class="page-link">←</a></li>');
$theme['numbers']  = array('<li class="page-item"><a class="page-link" href="{url}">{nr}</a></li> ', '<li class="page-item active"><a class="page-link" href="#">{nr}</a></li>');
$theme['next']     = array('<li class="page-item"><a class="page-link" href="{url}">→</a></li>', '<li class="page-item disabled"><a class="page-link">→</a></li>');
$theme['last']     = array('<li class="page-item"><a class="page-link" href="{url}">Last</a></li>', '<li class="page-item disabled"><a class="page-link">Last</a></li>');
$theme['post']     = '</ul><nav>';

return $theme;