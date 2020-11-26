<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Pointotech\CodeIgniter\Tools\CodeIgniterRoutesFinder;

class Routes extends CI_Controller
{
  public function index()
  {
    if (!is_cli()) {
      show_404();
      return;
    }

    echo "# Routes\n\n";
    foreach (CodeIgniterRoutesFinder::all_routes() as $route_url => $controller_method) {
      echo "- " . $route_url . ': ' . (is_string($controller_method) ? $controller_method : json_encode($controller_method)) . "\n";
    }

    echo "\n## Routing options\n\n";
    $routes_options = CodeIgniterRoutesFinder::routing_options();
    echo "- default_controller_url: " . $routes_options->default_controller_url() . "\n";
    echo "- translate_uri_dashes: " . ($routes_options->translate_uri_dashes() ? "Yes" : "No") . "\n";
  }
}
