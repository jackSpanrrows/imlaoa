<?php
defined('BASEPATH') OR exit('No direct script access allowed');

defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);
defined('APPCACHEKEY') OR define('APPCACHEKEY', 'www.imlaoarc.com'); //缓存前缀

defined('FILE_URL') OR define('FILE_URL', 'http://www.imlaoarc.com'); //附件地址
defined('WEB_URL') OR define('WEB_URL', 'http://www.imlaoarc.com');

defined('MP_CACHE_DEFAULT_EXPIRES_ZERO') OR define('MP_CACHE_DEFAULT_EXPIRES_ZERO', 0);
defined('MP_CACHE_DEFAULT_EXPIRES_TIME') OR define('MP_CACHE_DEFAULT_EXPIRES_TIME', 3600);
defined('PAGE_SIZE') OR define('PAGE_SIZE', 20);


defined('GB_CONF_FILE') OR define('GB_CONF_FILE', "conf.yaml");
defined('GB_DATA_CACHE_TIME') OR define('GB_DATA_CACHE_TIME', 60);
defined('GB_PAGE_CACHE_TIME') OR define('GB_PAGE_CACHE_TIME', 60);
defined('GB_SITE_DIR') OR define('GB_SITE_DIR', "./_site");


defined('GB_BLOG_CACHE') OR define('GB_BLOG_CACHE', "all_blog.gb");
defined('GB_TAG_CACHE') OR define('GB_TAG_CACHE', "all_tag.gb");
defined('GB_CATEGORY_CACHE') OR define('GB_CATEGORY_CACHE', "all_category.gb");
defined('GB_ARCHIVE_CACHE') OR define('GB_ARCHIVE_CACHE', "all_archive.gb");


