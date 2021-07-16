// JavaScript Document
<!-- hide from old browsers
function isalpha(x)
{
	for(i = x.length - 1; i >= 0; i--)
	{
			x.toLowerCase();
			if (x.charAt(i) == 'a' || x.charAt(i) == 'b' || x.charAt(i) == 'c' ||	
					x.charAt(i) == 'd' || x.charAt(i) == 'e' || x.charAt(i) == 'f' ||
					x.charAt(i) == 'g' || x.charAt(i) == 'h' || x.charAt(i) == 'i' ||
					x.charAt(i) == 'j' || x.charAt(i) == 'k' || x.charAt(i) == 'l' ||
					x.charAt(i) == 'm' || x.charAt(i) == 'n' || x.charAt(i) == 'o' ||
					x.charAt(i) == 'p' || x.charAt(i) == 'q' || x.charAt(i) == 'r' ||
					x.charAt(i) == 's' || x.charAt(i) == 't' || x.charAt(i) == 'u' ||
					x.charAt(i) == 'v' || x.charAt(i) == 'w' || x.charAt(i) == 'x' ||
					x.charAt(i) == 'y' || x.charAt(i) == 'z' ) 
				continue;
			else
				return false;
	}
	return true;
}
function isdigit(x)
{
	for(i = x.length - 1; i >= 0; i--)
	{
		if (x.charAt(i) == '0' || x.charAt(i) == '1' || x.charAt(i) == '2' ||
				x.charAt(i) == '3' || x.charAt(i) == '4' || x.charAt(i) == '5' ||
				x.charAt(i) == '6' || x.charAt(i) == '7' || x.charAt(i) == '8' ||
				x.charAt(i) == '9')
			continue;
		else
			return false;
	}
	return true;
}
function isnum(x)
{
	for(i = x.length - 1; i >= 0; i--)
	{
		if (x.charAt(i) == '0' || x.charAt(i) == '1' || x.charAt(i) == '2' ||
				x.charAt(i) == '3' || x.charAt(i) == '4' || x.charAt(i) == '5' ||
				x.charAt(i) == '6' || x.charAt(i) == '7' || x.charAt(i) == '8' ||
				x.charAt(i) == '9')
			continue;
		else
			return false;
	}
	return true;
}
function isalnum(x)
{
	return (isnum(x) && isalpha(x));
}
function isin(x,y)
{
	for(i = x.length - 1; i >= 0; i--)
	{
		for(j = y.length - 1; j >= 0; j--)
		{
			alert(x.charAt(i) + ":" + y.charAt(j));
			if (x.charAt(i) == y.charAt(j))
				break;
		}
		if (j < 0) return false;
	}
	return true;
}
// done hiding -->