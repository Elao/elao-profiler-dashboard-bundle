<?php

namespace Elao\Bundle\ProfilerDashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MetricsController extends Controller
{
    /**
     * @Route("/metrics", name="_elao_profiler_dashboard_metrics")
     */
    public function metricsAction(Request $request)
    {
        $profiler = $this->get('profiler');
        $profiler->disable();

        $profiles = array_map(function($token) use ($profiler) {
            return $profiler->loadProfile($token['token']);
        }, $profiler->find('', '', $request->query->get('limit', 100), '', '', ''));

        return $this->render('ElaoProfilerDashboardBundle:Metrics:dashboard.html.twig', [
            'request' => $request,
            'profiles' => $profiles,
        ]);
    }
}
