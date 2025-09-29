#include <stdio.h>
#include <string.h>

int main() {
	char s[100], n = 0, p = 0, k = 0;
	printf("Nhap chuoi vao: ");
	gets(s);
	fflush(stdin);
	puts(s);
	
	for (int i = 0; i < strlen(s); i++) {
		if (s[i] == 'a' || s[i] == 'o' || s[i] == 'e' || s[i] == 'u' || s[i] == 'i') n++;
		else if (s[i] != ' ') p++;
	}
	
	printf("Nguyen am: %d\n", n);
	printf("Phu am: %d\n\n", p);
	
	for (int i = 0; i < strlen(s); i++)
		if (s[i] != ' ') printf("%c", s[i]);
		else printf("\n");
		
	strrev(s);
	printf("\n\n");
	int strLen = strlen(s);
	
	for (int i = 0; i < strLen; i++) {
		if (s[i] == ' ' || i == strLen - 1) {
			for (int j = i; j >= k; j--)
				if (s[j] != ' ')
					printf("%c", s[j]);
			
			printf(" ");
			k = i + 1;
		}
	}
	return 0;
}
