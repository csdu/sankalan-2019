<pre>
  unsigned int teamSize = {{ $teamSize }};

  if (isWinner(team)) {
    Prize prize = getPrize(team);
    sendPrize(team, prize);
  }
</pre>