<?php

namespace Drupal\arche_core_dashboard\PathProcessor;

use Drupal\Core\PathProcessor\InboundPathProcessorInterface;
use Symfony\Component\HttpFoundation\Request;

class ArcheDashboardCorePathProcessor implements \Drupal\Core\PathProcessor\InboundPathProcessorInterface
{
    public function processInbound($path, Request $request)
    {
        if (strpos($path, '/dashboard-property/') === 0) {
            $names = preg_replace('|^\/dashboard-property\/|', '', $path);
            if (strpos($names, 'https:/') === 0) {
                $names = str_replace('https:/', 'https://', $names);
            } elseif (strpos($names, 'http:/') === 0) {
                $names = str_replace('http:/', 'http://', $names);
            }
            
            $names = strtr(base64_encode($names), '+/=', '._-');
            return "/dashboard-property/$names";
        }
        
        if (strpos($path, '/dashboard-property-api/') === 0) {
            $names = preg_replace('|^\/dashboard-property-api\/|', '', $path);
            $names = str_replace('/', ':', $names);
            return "/dashboard-property-api/$names";
        }
        
        if (strpos($path, '/dashboard-class-property/') === 0) {
            $names = preg_replace('|^\/dashboard-class-property\/|', '', $path);
            if (strpos($names, 'https:/') === 0) {
                $names = str_replace('https:/', 'https://', $names);
            } elseif (strpos($names, 'http:/') === 0) {
                $names = str_replace('http:/', 'http://', $names);
            }
            
            $names = strtr(base64_encode($names), '+/=', '._-');
            return "/dashboard-class-property/$names";
        }
        
        if (strpos($path, '/dashboard-format-property/') === 0) {
            $names = preg_replace('|^\/dashboard-format-property\/|', '', $path);
            if (strpos($names, 'https:/') === 0) {
                $names = str_replace('https:/', 'https://', $names);
            } elseif (strpos($names, 'http:/') === 0) {
                $names = str_replace('http:/', 'http://', $names);
            }
            
            $names = strtr(base64_encode($names), '+/=', '._-');
            return "/dashboard-format-property/$names";
        }
        
        if (strpos($path, '/dashboard-detail-prop-api/') === 0) {
            $names = preg_replace('|^\/dashboard-detail-prop-api\/|', '', $path);
            if (strpos($names, 'https:/') === 0) {
                $names = str_replace('https:/', 'https://', $names);
            } elseif (strpos($names, 'http:/') === 0) {
                $names = str_replace('http:/', 'http://', $names);
            }
            
            $names = strtr(base64_encode($names), '+/=', '._-');
            return "/dashboard-detail-prop-api/$names";
        }
        
        if (strpos($path, '/dashboard-values-by-property-api/') === 0) {
            $names = preg_replace('|^\/dashboard-values-by-property-api\/|', '', $path);
            $names = str_replace('/', ':', $names);
            return "/dashboard-values-by-property-api/$names";
        }
        
        
        if (strpos($path, '/dashboard-vbp-detail/') === 0) {
            $names = preg_replace('|^\/dashboard-vbp-detail\/|', '', $path);
            $names = str_replace('/', ':', $names);
            return "/dashboard-vbp-detail/$names";
        }
        
        if (strpos($path, '/dashboard-vbp-detail-api/') === 0) {
            $names = preg_replace('|^\/dashboard-vbp-detail-api\/|', '', $path);
            $names = str_replace('/', ':', $names);
            return "/dashboard-vbp-detail-api/$names";
        }
        
        return $path;
    }
}
