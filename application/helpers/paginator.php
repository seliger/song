<?php

	class Paginator {

		function paginate($url, $current_page, $total_items, $items_per_page = 20, $max_pages_listed = 10) {

	        $total_pages = floor($total_items / $items_per_page) 
	            + ceil(($total_items % $items_per_page) / $items_per_page);
	        $paginator_count = floor($total_pages / $max_pages_listed) 
	            + ceil(($total_pages % $max_pages_listed) / $max_pages_listed);

	        // Correct the situation if/when $total_pages is less than $max_pages_listed
	        if ($max_pages_listed > $total_pages) $max_pages_listed = $total_pages;

	        # Used to position oneself somewhere on the number line relative to the current
	        # grouping of pages.
	        $calculated_location = $current_page + $max_pages_listed;

	        if ( $current_page < ($total_pages - $max_pages_listed) ) {
	            if ($current_page < $max_pages_listed) {
	                $low_page = ($current_page == 1) ? 1 : $calculated_location - ($calculated_location - $current_page) - 1;
	            } else {
	               $low_page = $calculated_location - ($max_pages_listed - 1);
	            }
	        } elseif ($paginator_count == 1) {
	            $low_page = 1;
	        } else {
	            $low_page = $total_pages - $max_pages_listed;
	        }

	        if ($current_page < $total_pages - $max_pages_listed && $paginator_count > 1) {
	            if ($current_page < $max_pages_listed) {
	                $high_page = ($current_page == 1) ? $max_pages_listed : ($max_pages_listed + $low_page) - 1; 
	            } else {
	                $high_page = $calculated_location;
	            }
	        } else {
	            $high_page = $total_pages;
	        }


	        // Build the links for the pages
	        $pagelinks = "";
            for ($p = $low_page; $p <= $high_page; $p++ ) {
                $pagelinks .= "<li class=\"".(($current_page == $p) ? "active" : ""). "\"><a href=\"".BASE_URL.$url.$p."\">".$p."</a></li>";
            } 

	        // Emit the HTML blob for the pagination...
	        $blob  = '<nav aria-label="Page navigation"><ul class="pagination">';
	        $blob .= "<li class=\"". (($current_page == 1) ? "disabled" : "") ."\">";
	        $blob .= "<a href=\"". (($current_page > 1) ? BASE_URL.$url.($current_page - 1 ) : "")  ."\" aria-label=\"Previous\">";
	        $blob .= "<span aria-hidden=\"true\">&laquo;</span></a></li>";
	        $blob .= $pagelinks;
	        $blob .= "<li class=\"". (($current_page == $total_pages) ? "disabled" : "") ."\">";
	        $blob .= "<a href=\"". (($current_page <= $total_pages) ? BASE_URL.$url.($current_page + 1 ) : "") ."\" aria-label=\"Next\">";
	        $blob .= '<span aria-hidden="true">&raquo;</span></a></li></ul></nav>';

	        return $blob;
		}

	}

?>