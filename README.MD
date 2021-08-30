Task 4 - my notes:
I would move repositories implemantations to "infrastructure" layer, add "final class" to handlers and make some long lines shorter according with psr-12

# Accesto PHP/Symfony recruitment task

You are working on a small task management system. It allows to manage a simple todo list. 
One of the improvements that are currently developed are notifications. You are responsible for sending a "Task assigned" notification.

## Task scope

The code used for task management is already written, so is the notification service.

Implement the tasks one by one, following the order. Each step has its own tests, you can also run the whole test suite to test everything.

Please commit the initial state as "Initial commit", so we can easily follow your changes in form of following commits.

We intentionally skipped Docker set-up. If you need one, create it ;)

We will also need to know how much time it took to finish this task. 

### Task 1
Implement the InMemoryTaskRepository.

Run `composer test -- --group task1` in order to confirm.

### Task 2
Connect the existing dummy email notifier implementation with the notifier chain service. Keep in mind the config in services_test.yaml overrides the one in services.yaml.

Run `composer test -- --group task2` in order to confirm.

### Task 3
Extend the existing task management code and connect it with the notification service. As a result a notification should be sent to the user when (s)he is assigned to a task.
Keep in mind we would like to use events for this flow. 

Run `composer test -- --group task3` in order to confirm.

### Task 4
Review the code, what would you change in it? Write a short note, or just create a pull request and add your thoughts. 


