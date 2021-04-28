<?php

namespace App\Spotlight;

use LivewireUI\Spotlight\Spotlight;
use LivewireUI\Spotlight\SpotlightCommand;
use LivewireUI\Spotlight\SpotlightCommandDependencies;
use LivewireUI\Spotlight\SpotlightCommandDependency;
use LivewireUI\Spotlight\SpotlightSearchResult;

class menu_spotlight extends SpotlightCommand
{
    /**
     * This is the name of the command that will be shown in the Spotlight component.
     */
    protected string $name = 'Menu for Bot';

    /**
     * This is the description of your command which will be shown besides the command name.
     */
    protected string $description = 'Create a Menu for Bot Extension';

    /**
     * Defining dependencies is optional. If you don't have any dependencies you can remove this method.
     * Dependencies are asked from your user in the order you add the dependencies.
     */
    public function dependencies(): ?SpotlightCommandDependencies
    {
        return SpotlightCommandDependencies::collection()
            ->add(
                // In this example we will register a 'team' dependency
                SpotlightCommandDependency::make('team')
                // The default Spotlight placeholder will be changed to your dependency place holder
                ->setPlaceholder('For which team do you want to create a user?')
            );
    }

    /**
     * Spotlight will resolve dependencies by calling the search method followed by your dependency name.
     * The method will receive the search query as the parameter.
     */
    public function searchTeam($query)
    {
        return Team::where('name', 'like', "%$query%")
            ->get()
            ->map(function(Team $team) {
                // You must map your search result into SpotlightSearchResult objects
                return new SpotlightSearchResult(
                    $team->id,
                    $team->name,
                    sprintf('Create user for %s', $team->name)
                );
            });
    }

    /**
     * When all dependencies have been resolved the execute method is called.
     * You can type-hint all resolved dependency you defined earlier.
     */
    public function execute(Spotlight $spotlight, Team $team)
    {
        $spotlight->redirectRoute('teams.users.create', $team);
    }
}
