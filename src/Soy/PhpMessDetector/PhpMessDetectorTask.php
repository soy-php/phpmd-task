<?php

namespace Soy\PhpMessDetector;

use Soy\Task\CliTask;

class PhpMessDetectorTask extends CliTask
{
    const REPORT_XML = 'xml';
    const REPORT_HTML = 'html';
    const REPORT_TEXT = 'text';

    const RULESET_CLEAN_CODE = 'cleancode';
    const RULESET_CODE_SIZE = 'codesize';
    const RULESET_CONTROVERSIAL = 'controversial';
    const RULESET_DESIGN = 'design';
    const RULESET_NAMING = 'naming';
    const RULESET_UNUSED_CODE = 'unusedcode';

    /**
     * @var string
     */
    protected $binary = './vendor/bin/phpmd';

    /**
     * @var array
     */
    protected $rulesets = [
        self::RULESET_CLEAN_CODE,
        self::RULESET_CODE_SIZE,
        self::RULESET_CONTROVERSIAL,
        self::RULESET_DESIGN,
        self::RULESET_NAMING,
        self::RULESET_UNUSED_CODE,
    ];

    /**
     * @var string
     */
    protected $report = self::REPORT_TEXT;

    /**
     * @var array
     */
    protected $targets = [];

    /**
     * @var array
     */
    protected $excludePatterns = [];

    /**
     * @var string
     */
    protected $reportFile;

    /**
     * @var bool
     */
    protected $strict = false;

    /**
     * @var array
     */
    protected $suffixes = [];

    /**
     * @var int
     */
    protected $minimumPriority;

    /**
     * @return string
     */
    public function getCommand()
    {
        return $this->getBinary() . ' ' . implode(',', $this->getTargets()) . ' '
            . $this->getReport() . ' ' . implode(',', $this->getRulesets()) . ' '
            . (count($this->getExcludePatterns()) > 0
                ? '--exclude ' . implode(',', $this->getExcludePatterns()) . ' '
                : '')
            . ($this->getReportFile() !== null ? '--reportfile ' . $this->getReportFile() . ' ' : '')
            . (count($this->getSuffixes()) > 0 ? '--suffixes ' . implode(',', $this->getSuffixes()) . ' ' : '')
            . ($this->isStrict() === true ? '--strict ' : '')
            . ($this->getMinimumPriority() !== null ? '--minimumpriority ' . $this->getMinimumPriority() . ' ' : '');
    }

    /**
     * @return array
     */
    public function getRulesets()
    {
        return $this->rulesets;
    }

    /**
     * @param array $rulesets
     * @return $this
     */
    public function setRulesets(array $rulesets)
    {
        $this->rulesets = $rulesets;
        return $this;
    }

    /**
     * @param string $ruleset
     * @return $this
     */
    public function addRuleset($ruleset)
    {
        $this->rulesets[] = $ruleset;
        return $this;
    }

    /**
     * @param string $ruleset
     * @return $this
     */
    public function removeRuleset($ruleset)
    {
        $index = array_search($ruleset, $this->rulesets);
        if ($index !== false) {
            unset($this->rulesets[$index]);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * @param string $report
     * @return $this
     */
    public function setReport($report)
    {
        $this->report = $report;
        return $this;
    }

    /**
     * @return array
     */
    public function getTargets()
    {
        return $this->targets;
    }

    /**
     * @param array $targets
     * @return $this
     */
    public function setTargets($targets)
    {
        $this->targets = $targets;
        return $this;
    }

    /**
     * @param string $target
     */
    public function addTarget($target)
    {
        $this->targets[] = $target;
        return $this;
    }

    /**
     * @return array
     */
    public function getExcludePatterns()
    {
        return $this->excludePatterns;
    }

    /**
     * @param array $excludePatterns
     * @return $this
     */
    public function setExcludePatterns(array $excludePatterns)
    {
        $this->excludePatterns = $excludePatterns;
        return $this;
    }

    /**
     * @param string $excludePattern
     * @return $this
     */
    public function addExcludePattern($excludePattern)
    {
        $this->excludePatterns[] = $excludePattern;
        return $this;
    }

    /**
     * @return string
     */
    public function getReportFile()
    {
        return $this->reportFile;
    }

    /**
     * @param string $reportFile
     * @return $this
     */
    public function setReportFile($reportFile)
    {
        $this->reportFile = $reportFile;
        return $this;
    }

    /**
     * @return bool
     */
    public function isStrict()
    {
        return $this->strict;
    }

    /**
     * @param bool $strict
     * @return $this
     */
    public function setStrict($strict)
    {
        $this->strict = $strict;
        return $this;
    }

    /**
     * @return array
     */
    public function getSuffixes()
    {
        return $this->suffixes;
    }

    /**
     * @param array $suffixes
     * @return $this
     */
    public function setSuffixes(array $suffixes)
    {
        $this->suffixes = $suffixes;
        return $this;
    }

    /**
     * @param string $suffix
     * @return $this
     */
    public function addSuffix($suffix)
    {
        $this->suffixes[] = $suffix;
        return $this;
    }

    /**
     * @param string $suffix
     * @return $this
     */
    public function removeSuffix($suffix)
    {
        $index = array_search($suffix, $this->suffixes);
        if ($index !== false) {
            unset($this->suffixes[$suffix]);
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getMinimumPriority()
    {
        return $this->minimumPriority;
    }

    /**
     * @param int $minimumPriority
     */
    public function setMinimumPriority($minimumPriority)
    {
        $this->minimumPriority = $minimumPriority;
    }
}
