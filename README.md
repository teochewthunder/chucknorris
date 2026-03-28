# Chuck Norris Memorial (TBA)
This HTML page displays a different tech-related Chuck Norris "fact" with each reload.

# PHP
- connect to *ChatGPT* with a prompt.
- `fact` is defined as the response returned.
- In the HTML. the number is generated using the `rand()` function.

# HTML/CSS
- the `body` tag has a wallpaper of Chuck Norris.
- text is set to have a white outline using the `text-outline` property.
- `fact`, `number` and `rip` are the ids of divs.
  - `number` is at the top left. It contains a string that includes the a randomly generated number using the `rand()` function.
  - `fact` is below `number`, floated left and contains the PHP variable `fact`. It is hidden by default.
  - `rip` is just a line of text that is fixed on the bottom right side of the screen.

# jQuery / jQuery UI
- on DOM load
  - use the jQuey UI effect `bounce` on `number`.
  - use jQuery method `fadeIn()` on `fact`.

