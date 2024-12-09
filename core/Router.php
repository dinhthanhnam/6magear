<?php
class Router
{
    private $routes = [];

    // Thêm route với tham số động
    public function add($route, $callback)
    {
        // Biến điều kiện regular expression cho tham số động (thay {id} thành \d+)
        $route = preg_replace('/\{(\w+)\}/', '(?P<\1>\w+)', $route);
        $this->routes[$route] = $callback;
    }

    public function dispatch($url)
    {
        foreach ($this->routes as $route => $callback) {
            // Xử lý các route động với regex
            $pattern = preg_replace('/\{([a-zA-Z_]+):([^}]+)\}/', '(?P<$1>$2)', $route); // {param:regex} -> (?P<param>regex)
            $pattern = str_replace('/', '\/', $pattern); // Escape ký tự "/"
            $pattern = '/^' . $pattern . '$/'; // Thêm dấu bắt đầu và kết thúc regex
    
            // So khớp URL với route
            if (preg_match($pattern, $url, $matches)) {
                // Lọc các tham số (loại bỏ các key không phải string)
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
    
                if (is_callable($callback)) {
                    return $callback($params); // Truyền các tham số vào callback
                } elseif (is_array($callback)) {
                    $controller = new $callback[0]();
                    return call_user_func_array([$controller, $callback[1]], $params);
                }
            }
        }
    
        // Không tìm thấy route nào khớp
        http_response_code(404);
        echo "404 Not Found";
    }
    
}

