/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
int main()
{
	int x, y;
	printf("Moi nhap x: ");
	scanf("%d", &x);
	printf("Moi nhap y: ");
	scanf("%d", &y);
	// cau 1:
	printf("\n");
	printf("%d | %d | x = y + %d | x = %d\n", x, y, 3, y + 3);
	printf("%d | %d | x = y - %d | x = %d\n", x, y, 2, y - 2);
	printf("%d | %d | x = y * %d | x = %d\n", x, y, 5, y * 5);
	printf("%d | %d | x = x / y | x = %d\n", x, y, x / y);
	printf("%d | %d | x = x %% y | x = %d\n", x, y, x % y);
	
	// cau 2:
	printf("\n");
	printf("%d | %d | x += y | x = ", x, y);
	printf("%d\n", x += y);
	x = 10;
	printf("%d | %d | x -= y - %d | x = ", x, y, 2);
	printf("%d\n", x -= (y - 2));
	x = 10;
	printf("%d | %d | x *= y * %d | x = ", x, y, 5);
	printf("%d\n", x *= (y * 5));
	x = 10;
	printf("%d | %d | x /= x / y | x = ", x, y);
	printf("%d\n", x /= (x / y));
	x = 10;
	printf("%d | %d | x %%= y | x = ", x, y);
	printf("%d\n", x %= y);
	return 0;
}
