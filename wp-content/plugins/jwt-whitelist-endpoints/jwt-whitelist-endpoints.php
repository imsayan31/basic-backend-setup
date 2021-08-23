<?php

/**
 * 
 * @wordpress-plugin
 * Plugin Name:       JWT Whitelisting Endpoints for WP-API
 * Description:       Whitelisting some specified endpoints which are used for the WP REST API as authentication methods.
 * Version:           1.0
 * Author:            Sayan
 * Text Domain:       jwt-auth
 */

/* JWT allowing Headers for avoiding CORS issue - 23.08.2021 */
add_filter('jwt_auth_cors_allow_headers','register_allow_headers');

function register_allow_headers($headers){
    $headers['Access-Control-Allow-Origin'] = '*';
    $headers['Access-Control-Allow-Headers'] = 'Origin, X-Requested-With, Content-Type, Accept, Authorization';
    $headers['Access-Control-Allow-Methods'] = 'GET, POST, PUT, PATCH, DELETE, OPTIONS';
    $headers['Content-Type'] = 'application/json';
    return $headers;
}

/* JWT whitelisting some endpoints - 23.08.2021 */
add_filter('jwt_auth_whitelist', 'list_whitelisted_endpoints');

function list_whitelisted_endpoints($endpoints) {
    $your_endpoints = array(
        '/wp-json/sportsblog/v1/user-auth/add-user',
        '/wp-json/sportsblog/v1/user-auth/user-login',
        '/wp-json/sportsblog/v1/sports-blog/get-blogs',
        '/wp-json/sportsblog/v1/sports-blog/get-blog-details',
    );

    return array_unique( array_merge( $endpoints, $your_endpoints ) );
}