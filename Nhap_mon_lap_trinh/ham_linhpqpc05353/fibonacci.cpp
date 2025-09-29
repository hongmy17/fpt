/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>

int fibonacci(int n) {
    int j = 1, k = 1, kq;

    if (n <= 2) return 1;
    for (int i = 3; i <= n; i++) {
        kq = j + k;
        j = k;
        k = kq;
    }

    return kq;
}

int main() {
    int n;
    printf("Moi nhap n: ");
    scanf("%d", &n);
    printf("So hang thu %d trong day fibonacci la: %d\n", n, fibonacci(n));
    return 0;
}
