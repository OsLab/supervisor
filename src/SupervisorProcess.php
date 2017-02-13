<?php

/*
 * This file is part of the supervisor library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OsLab\Supervisor;

use Symfony\Component\Process\Process;

/**
 * Class SupervisorProcess
 *
 * @author Florent DESPIERRES <orions07@gmail.com>
 * @author Michael COULLERET <michael@coulleret.pro>
 */
class SupervisorProcess
{
    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        $process = new Process('supervisorctl status');
        $process->run();

        return $process->getOutput();
    }

    /**
     * Get all pid
     *
     * @return string
     */
    public function getAllPid()
    {
        $process = new Process('supervisorctl pid all');
        $process->run();

        return $process->getOutput();
    }

    /**
     * Get pid by program name
     *
     * @param string $name
     *
     * @return string
     */
    public function getPidByProgramName($name)
    {
        $process = new Process(sprintf('supervisorctl pid %s', $name));
        $process->run();

        return $process->getOutput();
    }
}
