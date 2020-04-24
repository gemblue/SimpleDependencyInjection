<?php
/**
 * Simple DI
 * 
 * Very simple Dependency Injector/Service Container.
 * For learning purpose.
 * 
 * @author Gemblue
 */
class Container {
    
    /**
     * Resolve class, instantiate automate by reflection.
     *
     * @return object
     */
    public function resolve(string $className) 
    {
        // Create a reflection.
        $reflector = new ReflectionClass($className);
        
        // Get it's constructor.
        $constructor = $reflector->getConstructor();
        
        // Search dependency and resolve. By constructor parameters.
        $args = $this->getDependencies($constructor->getParameters());

        return $reflector->newInstanceArgs($args); 
    }
}