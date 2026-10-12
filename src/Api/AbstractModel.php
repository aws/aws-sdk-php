<?php
namespace Aws\Api;

/**
 * Base class that is used by most API shapes
 */
abstract class AbstractModel implements \ArrayAccess
{
    /** @var array */
    protected $definition;

    /** @var ShapeMap */
    protected $shapeMap;

    /** @var array */
    protected $contextParam;

    /** @var array Cached serde plans keyed by ShapePlanCache slot. */
    protected $cachedPlans = [];

    /** @var int Graph generation the cached plans were built against. */
    protected $planGeneration = 0;

    /**
     * @param array    $definition Service description
     * @param ShapeMap $shapeMap   Shapemap used for creating shapes
     */
    public function __construct(array $definition, ShapeMap $shapeMap)
    {
        $this->definition = $definition;
        $this->shapeMap = $shapeMap;
        if (isset($definition['contextParam'])) {
            $this->contextParam = $definition['contextParam'];
        }
    }

    /**
     * Get a cached serde plan for the given slot.
     *
     * Returns null when no plan is cached, or when the cache is stale because
     * a related model object mutated since the plan was built.
     *
     * @param int $slot A ShapePlanCache slot constant.
     *
     * @return mixed|null
     * @internal
     */
    public function getSerdePlan($slot)
    {
        $this->syncPlanGeneration();

        return $this->cachedPlans[$slot] ?? null;
    }

    /**
     * Cache a serde plan for the given slot and return it.
     *
     * Returns the plan so providers can compile and cache in one expression.
     *
     * @param int   $slot A ShapePlanCache slot constant.
     * @param mixed $plan The compiled plan to cache.
     *
     * @return mixed The cached plan.
     * @internal
     */
    public function cacheSerdePlan($slot, $plan)
    {
        $this->syncPlanGeneration();
        $this->cachedPlans[$slot] = $plan;

        return $plan;
    }

    public function toArray()
    {
        return $this->definition;
    }

    /**
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->definition[$offset])
            ? $this->definition[$offset] : null;
    }

    /**
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        $this->definition[$offset] = $value;
        $this->invalidateResolvedModel();
    }

    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->definition[$offset]);
    }

    /**
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->definition[$offset]);
        $this->invalidateResolvedModel();
    }

    /**
     * Clear resolved child model objects cached on this instance.
     *
     * The base model caches no resolved children. Subclasses that memoize
     * resolved members, elements, or shapes override this to drop them so a
     * definition change is reflected on the next access.
     *
     * @return void
     */
    protected function clearResolvedModelCache()
    {
        // No resolved children on the base model.
    }

    /**
     * Drop resolved children and cached plans after a definition mutation, then
     * advance the graph generation so plans derived on related objects rebuild.
     *
     * Safe when no ShapeMap is present, which happens for mocks that construct
     * model objects directly.
     *
     * @return void
     */
    private function invalidateResolvedModel()
    {
        $this->clearResolvedModelCache();
        $this->cachedPlans = [];

        if ($this->shapeMap !== null) {
            $this->shapeMap->incrementGeneration();
            $this->planGeneration = $this->shapeMap->getGeneration();
        }
    }

    /**
     * Drop cached plans when the graph generation has moved past the one they
     * were built against.
     *
     * @return void
     */
    private function syncPlanGeneration()
    {
        if ($this->shapeMap === null) {
            return;
        }

        $generation = $this->shapeMap->getGeneration();
        if ($this->planGeneration !== $generation) {
            $this->cachedPlans = [];
            $this->planGeneration = $generation;
        }
    }

    protected function shapeAt($key)
    {
        if (!isset($this->definition[$key])) {
            throw new \InvalidArgumentException('Expected shape definition at '
                . $key);
        }

        return $this->shapeFor($this->definition[$key]);
    }

    protected function shapeFor(array $definition)
    {
        return isset($definition['shape'])
            ? $this->shapeMap->resolve($definition)
            : Shape::create($definition, $this->shapeMap);
    }
}
