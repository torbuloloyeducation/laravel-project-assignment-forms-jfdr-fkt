# Reflection Answers

When someone types their email and hits save, the form shoots that info somewhere to stash it for later. Then the page reloads, grabs whatever emails were saved before, and slaps them in a list under the form.

## Reflection Questions

1. **GET vs POST** – GET is just for reading stuff (like looking at a page), POST is for actually sending/saving something.

2. **That @csrf thing** – It's like a secret handshake so random websites can't sneak in and submit your form behind your back. Keeps the sketchy stuff out.

3. **Why the emails stick around** – Since the page refreshes every time you hit save, It's using the browser temporary memory to hold onto them. Otherwise they'd vanish as soon as the page reloads.

4. **The catch** – It's only temporary and the moment you close the tab everything goes away,