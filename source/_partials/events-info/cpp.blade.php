<pre>
  unsigned int teamSize = {{ $teamSize }};

  if (isWinner(team)) {
    Prize prize = event.getPrize();
    sendPrize(team, prize);
  }
</pre>