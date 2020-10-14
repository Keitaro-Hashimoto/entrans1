<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */
    
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    /*
     * CORSヘッダーを出力するパスのパターン、任意でワイルドカード(*)が利用できる。
     * 空だと一切のルートで機能しない。
     * Example: ['api/*']
     *   全てのルートを対象にする場合: ['*']
     *   APIと特定の画像を対象にする例: ['api/*', 'resources/example.png']
     */
    'allowed_methods' => ['*'],
     /*
    * マッチするHTTPメソッド。 `[*]` だと全てのリクエストにマッチする。
    * GETとPOSTだけを許可する場合: ['GET', 'POST']
    */
    'allowed_origins' => ['*'],
    /*
     * マッチするOrigin。`*`かオリジンに完全一致、またはワイルドカードが利用可。
     * '*', allowed_origins(完全一致), allowed_origins_patterns, allowed_origins(ワイルドカード)の順に評価されることになる。
     *  `[*]`にすると全てのオリジンで許可。
     * example.comとそのサブドメインを許可: ['https://example.com', 'https://*.example.com']
     */
    'allowed_origins_patterns' => [],
    /*
     * Matches the request origin with, similar to `Request::is()`
     * 正規表現によるオリジン指定。preg_matchの引数としてそのまま渡される。
     * 例: ['#\Ahttps?://.+\.example\.com\z#']
     */
    'allowed_headers' => ['*'],

    'exposed_headers' => [],
        /*
     *  Access-Control-Expose-Headers レスポンスヘッダーを指定する。 false or string[]
     */
    'max_age' => 0,
    /*
     * Access-Control-Max-Age レスポンスヘッダーを指定する。`false` or int
     * 600を指定すれば600秒このヘッダーがキャッシュされpreflightリクエストを減らせる。
      */
    'supports_credentials' => true,

];
