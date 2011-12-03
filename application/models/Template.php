<?php
/*
 * Template follow a /site/purpose/name.tpl naming convention.
 * Shared Templates:
 * - common/listing/some_template.tpl
 * - common/detail/some_template.tpl
 * Site Specific Tpls:
 * - site/listing/news.tpl
 * - site/listing/blogs.tpl
 * - site/listing/library.tpl
 * - site/detail/article.tpl
 * - site/detail/article.tpl
 * - site/detail/quote_of_the_day.tpl
 * Modules:
 * - common/module/generic_module.tpl
 * - site/module/ad_r.tpl
 */
class Template extends Content {
    protected $src_path; // Relative to views, extension not needed. Ex: news, site_article
    protected $src;
    
    public function __toString() {
        // Get template content
    }
}